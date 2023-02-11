<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
  public function index()
  {
     $banners = Banner::all();
     $products = Product::all();
     return view('index',compact('banners', 'products'));
  }
  
 
}
