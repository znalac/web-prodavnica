
@php
    use Illuminate\Support\Facades\Session;
@endphp

@extends('layouts.app')

@section('title')
    {{ Auth::User()->name }} | Cart
@endsection
@section('content')
 <div class="container">
  <div class="social mb-2">
                  
    <a href="https://www.facebook.com/EllenRaLinde/"><i class="fa fa-facebook-official" aria-hidden="true"></i>
    </a>
    <a href="https://www.instagram.com/ellenralinde/"><i class="fa fa-instagram" aria-hidden="true"></i>
    </a>
    <a href="https://www.facebook.com/technovikinglabel/"><i class="fa fa-facebook-official" aria-hidden="true"></i>
    </a>
    <a href="https://www.instagram.com/technovikinglabel/"><i class="fa fa-instagram" aria-hidden="true"></i>
    </a>
    <a href="https://www.facebook.com/rahennatattoo"><i class="fa fa-instagram" aria-hidden="true"></i>
    </a>
    <a href="https://www.instagram.com/ralindetattoo/"><i class="fa fa-facebook-official" aria-hidden="true"></i>
    </a>
</div>
     <div class="row">
         <div class="col-sm-7">
            @php
            $total = 0;
            @endphp
            @if ($user_cart->isNotEmpty())
         
      
            <table class="table">
                <thead>
                    <tr>
                        
                        <th>Product name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                       
                            <th>clothes sizes</th>
                      
                        <th>Image</th>
                        <th>Action</th>
                        
                       
                       
                        
                    </tr>
                </thead>
                <tbody>
                  
                    @foreach($user_cart  as $cart)
                    <tr>
                        <td>{{ $cart->product_name }}</td>
                     
                        <td style="width:65%">{{ $cart->description }}</td>
                        <td> €{{number_format($cart->price, 2, ',', '.')}}  </td>
                        <td>
                            
                           
                            {{$cart->qty}}
                            
                        </td>
                        <td>{{ $cart->clothes_sizes }}</td>
                        <td><img src="/images/{{$cart->image}}" class="img-fluid"></td>
                        <td class="action">
                            <form action="/cart/{{$cart->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="del"><i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            
                            </form>
                        </td>
                       @php
                           $total += $cart->price * $cart->qty/100 *session::get('vat')+ $cart->price * $cart->qty;
                           
                           
                       @endphp
                    
                    @endforeach
                    </tr>
                     <td> Total: €{{number_format($total, 2, ',', '.')}}  </td>
                   
                </tbody>
            </table>

           
            <div id="messages" role="alert"></div>
            @else
              <div class="alert alert-danger empty">
                  Your cart is empty!
            </div>  
            @endif

         </div>
         @if($user_cart->isNotEmpty())
        <div class="col-sm-5">
            @if  ( $message = Session::get('error'))
            {{$message}}                
             @endif
             <label for="Choose your country">choose your country</label>
             <form action="/vat" method="post">
              @csrf
              <select name="from" id="c" >
                <option value=""> Choose your country</option>
  
                @foreach ($countries as $code => $name)
                <option value="{{$code}}"> {{$name}}</option>
                @endforeach
  
              </select>
              <button> Calculate vat </button>
            </form>
           
            <form action="/cart" method="post" id="payment-form">
                @csrf

               
                <label for="payment_method">Payment method</label> <br>
                <label for="Card">Card</label>
                <input type="radio" id="card" name="payment" value="card">
                <label for="paypal">Paypal</label>
                <input type="radio" id="paypal" name="payment" value="paypal">
                
                
                <div class="payment-card"> 
                  <input type="hidden" name="user_id" value="{{Auth::id()}}" >
                  <input type="hidden" name="total_price" id="" value="{{$total}}">
                
                  <input type="text" name="name" placeholder="Your name" id="name">
                  <input type="text" name="invoice_adress" placeholder="Invoice adress and postal code" id="address">
                  <input type="text" name="delivery_adress" id="Delivery_address" placeholder="Delivery adress">
                  <input type="email" name="email" placeholder="Email" class="email" id="email">
                  <input type="text" name="city" placeholder="city" id="city">
                  <input type="text" name="postal_code" placeholder="Postal code" id="postal_code">
                  <input type="text" name="country" placeholder="Country" id="country">
                <input type="text" name="card_name" placeholder="Name on card" id="cardname">
               <div class="form-group">
                   
                   <label for="card-element">
                       credit or debit card
                   </label>
                  
                    <div id="card-element">
                    
                    </div>
                  
                  
                   
               </div>
               <button  class="button" name="card">
                <div class="spinner hidden" id="spinner"></div>
                <span id="button-text">Pay now</span>
              </button>
                <div id="messages"></div>
            </div>
                
            </form>
            <div class="payment-paypal">
              @if ($error = Session::get('error') )
                 <div class="alert alert-danger">
                  {{$error}}
                 </div>
              @endif
              <form action="/paypal-payment" method="post">
               @csrf
               <input type="hidden" name="user_id" value="{{Auth::id()}}" >
               <input type="hidden" name="total_price" id="" value="{{$total}}">
               <input type="text" name="name" placeholder="Your name">
               <input type="text" name="invoice_adress" placeholder="Invoice adress and postal code" >
               <input type="text" name="delivery_adress"  placeholder="Delivery adress">
              
               <input type="email" name="email" placeholder="Email" class="email" >
               <input type="text" name="city" placeholder="city" id="">
               <input type="text" name="postal_code" placeholder="Postal code" >
               <input type="text" name="country" placeholder="Country" >
               <button type="submit" name="paypal" class="pay">Pay now</button>
              </form>
             </div>
        </div>
        @endif
     </div>
 
 </div>
@endsection

@section('js')
<script>

const stripe = Stripe('pk_test_51Kf6n1JJ62elaW6DvIIeg3wdI2XJYVC2tj5M4makMXZWMcNVgUUWh9gKiJY6UUE6QKIApFSuo9pt3WUsU18MRkqQ004G2Li9Sg');

var elements = stripe.elements();
var card = elements.create('card',{
    hidePostalCode: true  
});
card.mount('#card-element');
card.addEventListener('change', function(event) {
            var displayError = document.getElementById('messages');
            if (event.error) {
              displayError.textContent = event.error.message;
            } else {
              displayError.textContent = '';
            }
          });


          var form = document.getElementById('payment-form');
          form.addEventListener('submit', function(event) {
            event.preventDefault();
        

            var options = {
              name: document.getElementById('name').value,
                name_on_card: document.getElementById('cardname').value,
                address_line1: document.getElementById('address').value,
                address_line2: document.getElementById('Delivery_address').value,
                address_city: document.getElementById('city').value,
                email: document.getElementById('email').value,
                address_zip: document.getElementById('postal_code').value,
               country: document.getElementById('country').value,
              }

            stripe.createToken(card,options).then(function(result) {
              if (result.error) {
                // Inform the user if there was an error
                var errorElement = document.getElementById('messages');
                errorElement.textContent = result.error.message;
              } else {
                // Send the token to your server
                console.log(result.token.id);
              
              var hiddenInput = document.createElement('input');
              hiddenInput.setAttribute('type', 'hidden');
              hiddenInput.setAttribute('name', 'stripeToken');
              hiddenInput.setAttribute('value', result.token.id);
              form.appendChild(hiddenInput);
              // Submit the form
              form.submit();
           
              }
            });
          });

</script>

<script>
   $(document).ready(function() {
   $('input[type="radio"]').click(function() {
       if($(this).attr('id') == 'card') {
            $('.payment-card').show();           
       }

       else {
            $('.payment-card').hide();   
       }
   });

   $('input[type="radio"]').click(function() {
       if($(this).attr('id') == 'paypal') {
            $('.payment-paypal').show();           
       }

       else {
            $('.payment-paypal').hide();   
       }
   });
 
 
        });
    
</script>



@endsection