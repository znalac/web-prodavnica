<?php

namespace App\Http\Controllers;

use App\Mail\Invoice;
use App\Mail\SendMail;
use App\Mail\OrderMail;
use App\Mail\OrderPlaced;
use App\Mail\ThankYou;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Dj;
use App\Models\gallery;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use App\Notifications\newOrder;
use Darryldecode\Cart\Cart as CartCart;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;
use Omnipay\Omnipay;
use Barryvdh\DomPDF\Facade\Pdf;

use function Opis\Closure\unserialize;
use Ibericode\Vat\Countries;
use Ibericode\Vat\Rates;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $gateway;
    public function __construct()
    {
        $this->middleware('auth')->except('singleProduct','categoryProducts', 'hennaTatoo', 'about', 'sendMail','dj','privacy');
        
    $this->gateway = Omnipay::create('PayPal_Rest');
    $this->gateway->initialize(array(
        'clientId' => env('PAYPAL_CLIENT_ID'),
        'secret'   => env('PAYPAL_CLIENT_SECRET'),
        'testMode' => true, 
    ));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners = Banner::all();
        $products = Product::all();
        return view('home',compact('banners','products'));
    }
    public function singleProduct(Product $product)
    {
     
     
        
          
        return view('single_product',compact( 'product'));
    }

    public function categoryProducts(Category $category)
    {
        $category_products = $category->products;
        return view('category_products',compact('category_products','category'));
    }

    public function cart(Request $request, Cart $cart)
    {
        $user_cart = Cart::where('user_id',Auth::id())->get();
        $countries = new Countries();
        return view('user_cart',compact('user_cart', 'countries'));
    }
    public function Deletecart(Cart $cart)
    {
        $cart->delete();
        return redirect('/cart');

    }
    public function CartStore(Product $product, Request $request)
    {
     $cart = new Cart();
     
      $cart->product_id = request('product_id');
      $cart->user_id = request('user_id');
      $cart->product_name = request('product_name');
      $cart->description = request('product_description');
      $cart->price = request('product_price');
      $cart->qty = request('qty');
      
      if (isset($request->size)) {
         $cart->clothes_sizes = request('size');
        
      } else {
        $cart->clothes_sizes = null;
      }
      
      $cart->image = request('product_image');

     
      $cart->save();
    
      return redirect('/product/'.$product->id)->with('success','product added to the cart successfully');
    }

    public function hennaTatoo()
    {
        $galleries = gallery::all();
        return view('henna_tatoo',compact('galleries'));

    }

    public function about()
    {
        return  view('about_contact');
        
    }

    public function sendMail(Request $request)
    {
        $datavalidate = request()->validate([
            'fullname' =>'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'attachment' => 'mimes:jpeg,jpg,png'
        ]);

       $data = array(
           'fullname' => $request->fullname,
           'email' => $request->email,
           'subject' =>$request->subject,
           'message'=> $request->message,
           'attachment' => $request->attachment,
       ); 
       
        Mail::to("malacznalac@gmail.com")->send(new SendMail($data));
        return back()->with('success','Message was sent – Thank you!
        I will get back to you shortly. For urgent requests, please reach me on the telephone number provided in the contact detail section above.');


    }
    
    public function orders(Request $request)
    {
        $orders = Auth::user()->orders;
     
        
       

         
          
            
       
         return view('orders',['orders'=>$orders]);


     
   
    }
    public function paypalPayment(Request $request)
    {
        $validate = request()->validate([
            'name' => 'required', 
            'invoice_adress' => 'required',
            'delivery_adress' => 'required',
            'email' => 'required|email',
            'city' => 'required',
            'postal_code' => 'required',
            'country' => 'required',

        ]);
        try {
            Session::put('name',$request->name);
            Session::put('invoice_adress',$request->invoice_adress);
            Session::put('delivery_adress',$request->delivery_adress);
            Session::put('email',$request->email);
            Session::put('city',$request->city);
            Session::put('postal_code',$request->postal_code);
            Session::put('country',$request->country);
          
               
        

            $response = $this->gateway->purchase(array(
                'amount' => $request->total_price,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' =>url('success'),
                'cancelUrl' => url('cart'),
              
         
                ))->send();
                
                if ($response->isRedirect()) {
                    $response->redirect(); 
                    
                    
                } else {
                    // not successful
                    return $response->getMessage();
                }
           
              
      
               
           
                

        } catch (\Exception $e) {
             return redirect()->route('chekout')->with('error', $e->getMessage());
        }
    }
    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID'))
        {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();
            if ($response->isSuccessful())
            {
                $order = new order();
                $order->user_id = Auth::id();
                $order->invoice_adress =  Session::get('invoice_adress');
                $order->delivery_adress =  Session::get('delivery_adress');
                $order->email =  Session::get('email');
                $order->city =  Session::get('city');
                $order->country =  Session::get('country');
                $order->postal_code = Session::get('postal_code');
                $order->name =   Session::get('name');
                $order->payment_id =$request->paymentId;
            
                    $order->payment_method = "Paypal";
                   

                
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
               
                
                    
                 return redirect('/home')->with('success','Succesfully purchase products');
                 
                 
                   
                   
                 
               
                
             
             
            } else {
                return $response->getMessage();
            }
         
        
        } else {
            return redirect('/cart')->with('error','Transaction is declined');
        } 
    }

    public function dj()
    {
        $dj_banner = Dj::all();
        return view('dj',compact('dj_banner'));
    }

   public function privacy()
   {
    return view('privacy_policy');
   }
}























