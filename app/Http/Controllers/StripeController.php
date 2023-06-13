<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceStripe;
use App\Mail\OrderPlaced;
use App\Mail\ThankYou;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Ibericode\Vat\Countries;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Omnipay\Omnipay;
use Ibericode\Vat\Rates;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class StripeController extends Controller
{
    public $gateway;
    public $comletePaymentUrl;

    public function __construct()
    {
        $this->gateway = Omnipay::create('Stripe\PaymentIntents');
     $this->gateway->setApiKey('sk_test_51Kf6n1JJ62elaW6DFqPcQ8NLS8blBdKu3A51h03J8rwyHTRgF9eowYG2kJA8YLudHrx1ZOcAneCboWJg69AFipq000byMkpfD3');
        $this->completePaymentUrl = url('confirm');

    }


    public function charge(Request $request)
    {

        $validate = request()->validate([
            
            'name'=>'required',
            'invoice_adress' =>'required',
            'delivery_adress'=>'required',
            'email' => 'required|email',
            'city' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'card_name' => 'required',
            

        ]);

      if ($request->input('stripeToken')) {
        $token = $request->input('stripeToken');

        Session::put('name',$request->name);
        Session::put('invoice_adress',$request->invoice_adress);
        Session::put('delivery_adress',$request->delivery_adress);
        Session::put('email',$request->email);
        Session::put('city',$request->city);
        Session::put('postal_code',$request->postal_code);
        Session::put('country',$request->country);
        $response = $this->gateway->purchase([
            'amount'                   => $request->input('total_price'),
            'currency'                 => env('STRIPE_CURRENCY'),
            
            'token'            => $token,
            'returnUrl'                => $this->completePaymentUrl,
            'confirm'                  => true,
        ])->send();
         



        if ($response->isSuccessful()) {
    
            // Payment was successful
           $data = $response->getData();
            $order = new Order();
            $order->user_id = Auth::id();
            
            $order->delivery_adress = $request->delivery_adress;
            $order->invoice_adress =$request->invoice_adress;
            $order->email = $request->email;
            $order->city = $request->city;
            $order->country = $request->country;
            $order->postal_code = $request->postal_code;
            $order->name = $request->name;
            $order->payment_id = $data['id'];
            $order->payment_method = "Card";  
            $order->save();
            $order->id;
         
            $user_cart = Cart::where('user_id',Auth::id())->get();
            foreach ($user_cart as $item ) {
               $order_item = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'qty' => $item->qty,
                    'price' => $item->price,
                     'clothes_sizes' => (isset($item->clothes_sizes)) ? $item->clothes_sizes : null,
                     'user_id' => Auth::id(),
                ]);
               
                Cart::destroy($item->id);
                $product = Product::find($item->product_id);
                $product->decrement('qty', $item->qty);
           
            }
            Mail::to("malacznalac@gmail.com")->send(new OrderPlaced($order));
            Mail::to($order->email)->send(new ThankYou);
            return redirect('home')->with('success', 'Successfully purchased products!');
        
        } elseif ($response->isRedirect()) {
            
            // Redirect to offsite payment gateway
            $response->redirect();
        
        } else {
        
            // Payment failed
            echo $response->getMessage();
        }
      }
   


      
    }
  public function confirm(Request $request)
  {
    $response = $this->gateway->confirm([
        'paymentIntentReference' => $request->input('payment_intent'),
        'returnUrl' => $this->completePaymentUrl,
    ])->send();

    if ($response->isSuccessful()) {
        // All done!! 
        $data = $response->getData();
        $order = new Order();
        $order->user_id = Auth::id();
        
        $order->delivery_adress = Session::get('delivery_adress');
        $order->invoice_adress = Session::get('invoice_adress');
        $order->email = Session::get('email');
        $order->city =  Session::get('city');
        $order->country = Session::get('country');
        $order->postal_code = Session::get('postal_code');
        $order->name = Session::get('name');
        $order->payment_id = $data['id'];
        $order->payment_method = "Card"; 
        $order->save();
        Session::forget('invoice_adress');
               Session::forget('delivery_adress');
               Session::forget('email');
               Session::forget('city');
               Session::forget('country');
               Session::forget('postal_code');
               Session::forget('name');
        $order->id;
     
        $user_cart = Cart::where('user_id',Auth::id())->get();
        foreach ($user_cart as $item ) {
           $order_item = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'qty' => $item->qty,
                'price' => $item->price,
                 'clothes_sizes' => (isset($item->clothes_sizes)) ? $item->clothes_sizes : null,
                 'user_id' => Auth::id(),
            ]);
           
            Cart::destroy($item->id);
            $product = Product::find($item->product_id);
            $product->decrement('qty', $item->qty);
       
        }
        Mail::to("malacznalac@gmail.com")->send(new OrderPlaced($order));
        Mail::to($order->email)->send(new ThankYou);
        return redirect('home')->with('success', 'Successfully purchased products!');
    } else {
        echo $response->getMessage();
        Session::forget('invoice_adress');
               Session::forget('delivery_adress');
               Session::forget('email');
               Session::forget('city');
               Session::forget('country');
               Session::forget('postal_code');
               Session::forget('name');
    }


  }
 public function vat(Request $request) {

    $this->validate($request,[
        'from'=>'required'
    ]);
    $countries = new Countries();
    if($countries->isCountryCodeInEU($request->input('from'))){
        $rates = new Rates('vat-rates.json');  
        $tax= $rates->getRateForCountry($request->input('from'));
        Session::put('from',$request->input('from'));
        Session::put('vat',$tax);
        
       
        return redirect('cart');
    }else{
       Session::put('vat',0);
   
       return redirect('cart');
    
    }
 } 
 
     public function dhl(Request $request)  {
      
  }  

}
