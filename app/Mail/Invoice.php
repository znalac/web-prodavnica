<?php

namespace App\Mail;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;

class Invoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
public $properties;
    public function __construct($order)
    {
        $this->properties = Cart::with('product')->get();
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        return $this-> from($this->order->email)->subject('Invoice')-> view('invoice',['order'=>$this->order]);
   
    }
}
