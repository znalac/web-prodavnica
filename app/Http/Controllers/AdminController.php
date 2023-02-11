<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Dj;
use App\Models\gallery;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Size;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        return view('admin.welcome');
    }
 public function categories()
 {
     $categories = Category::all();
     return view('admin.categories',compact('categories'));
 }

 public function create()
 {
     return view('admin.create_category');
 }
   
 public function storeCategories()
 {
    $validate = request()->validate([
        'category_name' => 'required',
        'category_description' =>'required',
    ]);

    $category = new Category();
    $category->name = request('category_name');
    $category->description = request('category_description');
    $category->save();
    return redirect('/admin/categories')->with('success', 'Category created successfully');
 }
public function editCategory(Category $category)
{
    return view('admin.edit_category',compact('category'));
}

public function updateCategory(Category $category)
{
    $validate = request()->validate([
        'category_name' => 'required',
        'category_description' =>'required',
    ]);

    $category->name = request('category_name');
    $category->description = request('category_description');
    $category->update();
    return redirect('/admin/categories')->with('update', 'Category updated successully');
}
public function deleteCategory(Category $category)
{
   $category->delete();
   return redirect('admin/categories')->with('delete','delete successfully');
}
public function products()
{
    $products = Product::all();
    return view('admin.products',compact('products'));
}

public function productscreate()
{
    $categories = Category::all();
    $sizes = Size::all();
   
    return view('admin.create_products',compact('categories', 'sizes'));
}
public function productsStore ()
{
  $validate = request()->validate([
    'product_name' => 'required',
    'product_description' =>'required',
     'price' => 'required',
     'qty' => 'required',
     'image1' => 'required|mimes:jpg,png,jpeg',
     'image2' => 'required|mimes:jpg,png,jpeg',
     'image3' => 'required|mimes:jpg,png,jpeg',
     'image4' => 'required|mimes:jpg,png,jpeg',
     'image5' => 'required|mimes:jpg,png,jpeg',
     'image6' => 'required|mimes:jpg,png,jpeg',
     'image7' => 'required|mimes:jpg,png,jpeg',
     'image8' => 'required|mimes:jpg,png,jpeg',
     'image9' => 'required|mimes:jpg,png,jpeg',
     'image10' => 'required|mimes:jpg,png,jpeg',
  ]);

  if (request()->hasFile('image1')) {
    $image1 = request()->file('image1');
    $image1_name = time(). '1.'.$image1->extension();
    $image1->move(public_path('images'), $image1_name);
}

if (request()->hasFile('image2')) {
    $image2 = request()->file('image2');
    $image2_name = time(). '2.'.$image2->extension();
    $image2->move(public_path('images'), $image2_name);
}
if (request()->hasFile('image3')) {
    $image3 = request()->file('image3');
    $image3_name = time(). '3.'.$image3->extension();
    $image3->move(public_path('images'), $image3_name);
}
if (request()->hasFile('image4')) {
    $image4 = request()->file('image4');
    $image4_name = time(). '4.'.$image4->extension();
    $image4->move(public_path('images'), $image4_name);
}

if (request()->hasFile('image5')) {
    $image5 = request()->file('image5');
    $image5_name = time(). '5.'.$image5->extension();
    $image5->move(public_path('images'), $image5_name);
}

if (request()->hasFile('image6')) {
    $image6 = request()->file('image6');
    $image6_name = time(). '6.'.$image6->extension();
    $image6->move(public_path('images'), $image6_name);
}

if (request()->hasFile('image7')) {
    $image7 = request()->file('image7');
    $image7_name = time(). '7.'.$image7->extension();
    $image7->move(public_path('images'), $image7_name);
}

if (request()->hasFile('image8')) {
    $image8 = request()->file('image8');
    $image8_name = time(). '8.'.$image8->extension();
    $image8->move(public_path('images'), $image8_name);
}

if (request()->hasFile('image9')) {
    $image9 = request()->file('image9');
    $image9_name = time(). '9.'.$image9->extension();
    $image9->move(public_path('images'), $image9_name);
}

if (request()->hasFile('image10')) {
    $image10 = request()->file('image10');
    $image10_name = time(). '10.'.$image10->extension();
    $image10->move(public_path('images'), $image10_name);
}

$product = new Product();
 $product->product_name = request('product_name');
 $product->description = request('product_description');
 $product->price = request('price');      
 $product->qty = request('qty');
 $product->image1 = $image1_name;
 $product->image2 = $image2_name;
 $product->image3 = $image3_name;
 $product->image4 = $image4_name;
 $product->image5 = $image5_name;
 $product->image6 = $image6_name;
 $product->image7 = $image7_name;
 $product->image8 = $image8_name;
 $product->image9 = $image9_name;
 $product->image10 = $image10_name;
 $product->category_id = request('category');

 $product->save();

 $product->sizes()->attach(request('sizes'));

 return redirect('/admin/products')->with('success','Created product successfully');

}
  public function productDelete(Product $product)
  {
     $product->delete();

    
     if(file_exists(public_path('images/'. $product->image1))){

        unlink(public_path('images/' . $product->image1));
  
      }
      
      if(file_exists(public_path('images/'. $product->image2))){

        unlink(public_path('images/' . $product->image2));
  
      }
      
      if(file_exists(public_path('images/'. $product->image3))){

        unlink(public_path('images/' . $product->image3));
  
      }
      
      if(file_exists(public_path('images/'. $product->image4))){

        unlink(public_path('images/' . $product->image4));
  
      }
      
      if(file_exists(public_path('images/'. $product->image5))){

        unlink(public_path('images/' . $product->image5));
  
      }
      
      if(file_exists(public_path('images/'. $product->image6))){

        unlink(public_path('images/' . $product->image6));
  
      }
      
      if(file_exists(public_path('images/'. $product->image7))){

        unlink(public_path('images/' . $product->image7));
  
      }
      
      if(file_exists(public_path('images/'. $product->image8))){

        unlink(public_path('images/' . $product->image8));
  
      }
      
      if(file_exists(public_path('images/'. $product->image9))){

        unlink(public_path('images/' . $product->image9));
  
      }
      
      if(file_exists(public_path('images/'. $product->image10))){

        unlink(public_path('images/' . $product->image10));
  
      }

      return redirect('/admin/products')->with('success','Product deleted successfully');


  }  

    public function productEdit(Product $product)
    {
      $categories = Category::all();
      $sizes = size::all();
      
      
     return view('admin.edit_product', compact('product', 'categories','sizes'));
    }

    public function productUpdate(Product $product,Request $request)
    {
      $validate = request()->validate([
        'product_name' => 'required',
        'product_description' =>'required',
         'price' => 'required',
         'qty' => 'required',
         
      ]);

      $product->product_name = request('product_name');
      $product->description = request('product_description');
      $product->price = request('price');      
      $product->qty = request('qty');

      if (isset($request->image1)) {
        unlink(public_path('images/' . $product->image1));
        $image1 = request()->file('image1');
    $image1_name = time(). '1.'.$image1->extension();
    $image1->move(public_path('images'), $image1_name);
        
    $product->image1 = $image1_name;
    }
     
    


    if (isset($request->image2)) {
      unlink(public_path('images/' . $product->image2));
      $image2 = request()->file('image2');
  $image2_name = time(). '2.'.$image2->extension();
  $image2->move(public_path('images'), $image2_name);
      
  $product->image2 = $image2_name;
  }

  
  if (isset($request->image3)) {
    unlink(public_path('images/' . $product->image3));
    $image3 = request()->file('image3');
$image3_name = time(). '3.'.$image3->extension();
$image3->move(public_path('images'), $image3_name);
    
$product->image3 = $image3_name;
}

if (isset($request->image4)) {
  unlink(public_path('images/' . $product->image4));
  $image4 = request()->file('image4');
$image4_name = time(). '4.'.$image4->extension();
$image4->move(public_path('images'), $image4_name);
  
$product->image4 = $image4_name;
}
if (isset($request->image5)) {
  unlink(public_path('images/' . $product->image5));
  $image5 = request()->file('image5');
$image5_name = time(). '5.'.$image5->extension();
$image5->move(public_path('images'), $image5_name);
  
$product->image5 = $image5_name;
}

if (isset($request->image6)) {
  unlink(public_path('images/' . $product->image6));
  $image6 = request()->file('image6');
$image6_name = time(). '6.'.$image6->extension();
$image6->move(public_path('images'), $image6_name);
  
$product->image6 = $image6_name;
}
if (isset($request->image7)) {
  unlink(public_path('images/' . $product->image7));
  $image7 = request()->file('image7');
$image7_name = time(). '7.'.$image7->extension();
$image7->move(public_path('images'), $image7_name);
  
$product->image7 = $image7_name;
}
if (isset($request->image8)) {
  unlink(public_path('images/' . $product->image8));
  $image8 = request()->file('image8');
$image8_name = time(). '8.'.$image8->extension();
$image8->move(public_path('images'), $image8_name);
  
$product->image8 = $image8_name;
}

if (isset($request->image9)) {
  unlink(public_path('images/' . $product->image9));
  $image9 = request()->file('image9');
$image9_name = time(). '9.'.$image9->extension();
$image9->move(public_path('images'), $image9_name);
  
$product->image9 = $image9_name;
}
if (isset($request->image10)) {
  unlink(public_path('images/' . $product->image10));
  $image10 = request()->file('image10');
$image10_name = time(). '10.'.$image10->extension();
$image10->move(public_path('images'), $image10_name);
  
$product->image10 = $image10_name;
}
$product->category_id = request('category');
$product->update();
$product->sizes()->sync(request('sizes'));

return redirect('/admin/products')->with('update', 'Product updated successfully');

    }



    public function clothesSizes()
    {
      $clothes_sizes  = Size::all();
      return view('admin.clothes_size', compact('clothes_sizes') );
    }

    public function createSizes()
    {
      return view('admin.create_clothes_size');
    }

    public function storeSizes()
    {
      $validate = request()->validate([
        'clothes_size' => 'required',
         
      ]);
      $sizes = new Size();
      $sizes->clothes_size = request('clothes_size');
      $sizes->save();
      return redirect('/admin/clothes/sizes')->with('success', 'Clothes size Created successfully');

    }

    public function editSizes(Size $size)
    {
      return view('admin.edit_clothes_size',compact('size'));
    }

   public function updateSizes(Size $size)
   {
    $validate = request()->validate([
      'clothes_size' => 'required',
       
    ]);
    $size->clothes_size = request('clothes_size');
    $size->update();
    return redirect('/admin/clothes/sizes')->with('update','Clothes size updated successfully');
   }


   public function deleteSizes(Size $size)
   {
     $size->delete();
     return redirect('/admin/clothes/sizes')->with('delete','Clothes size deleted successfully');
   }


 public function banners()
 {
   $banners = Banner::all();
   return view('admin.banners',compact('banners'));
 }

 public function createBanner()
 {
   return view('admin.create_banner');
 }
 public function storeBanner()
 {
  $validate = request()->validate([
    'banner_image' => 'required',
     
  ]);



  if (request()->hasFile('banner_image')) {
    $banner_image = request()->file('banner_image');
    $banner_name = time(). 'banner.'.$banner_image->extension();
    $banner_image->move(public_path('images'), $banner_name);
}  

    $banner = new Banner();
     $banner->image = $banner_name;
     $banner->save();
  
      return redirect('/admin/banners')->with('success', 'Banner image successully created');
 }


 public function deleteBanner(Banner $banner)
 {
   $banner->delete();
   if(file_exists(public_path('images/'. $banner->image))){

    unlink(public_path('images/' . $banner->image));

  }
  return redirect('/admin/banners')->with('delete', 'Banner image successfully deleted');
 }
 public function gallery()
 {
   $galleries = gallery::all();
   return view('admin.galleries',compact('galleries'));
 }
 public function createGallery()
 {
    return view('admin.create_gallery');
 }
public function storeGallery()
{
  $data = request()->validate([
     'image_name' => 'required',
     'image' => 'mimes:jpeg,jpg,png|required'
  ]);

  if (request()->hasFile('image')) {
    $image = request()->file('image');
    $name = time(). 'tatoo.'.$image->extension();
    $image->move(public_path('images'), $name);
} 
 $gallery = new gallery();
  
  $gallery->image_title = request('image_name');
  $gallery->image = $name;
  $gallery->save();
  return redirect('/admin-henna-tatoo')->with('success','Image saved successfully');
}

public function editgallery(gallery $gallery)
{
  
  return view('admin.edit_gallery',compact('gallery'));
}

public function updategallery(gallery $gallery, Request $request)
{
  $data = request()->validate([
    'image_name' => 'required',
    'image' => 'mimes:jpeg,jpg,png|required'
 ]);

 $gallery->image_title = request('image_name');
 if (isset($request->image)) {
  unlink(public_path('images/' . $gallery->image));
  $image = request()->file('image');
$image_name = time(). 'tatoo.'.$image->extension();
$image->move(public_path('images'), $image_name);
  
$gallery->image = $image_name;
}
$gallery->update();
return redirect('/admin-henna-tatoo')->with('update', 'image updated successfully');
}
public function deletegallery(gallery $gallery)
{
  $gallery->delete();
  if(file_exists(public_path('images/'. $gallery->image))){

   unlink(public_path('images/' . $gallery->image));

 }
 return redirect('/admin-henna-tatoo')->with('delete', 'image deleted successfully');
}
  public function usersorders()
  {
    
    $orderItem = Order::where('shipped_status',0)->get();

    return view('admin.user_orders',compact('orderItem'));
  }

  public function updateStatus(Order $order)
  {
    $order->shipped_status = request('status');
    $order->update();
    return redirect('/admin-orders')->with('success','Shipped status successfully changed');
  }
  public function shippedOrders()
  {
    $Shipped_Item = Order::where('shipped_status',1)->get();
    return view('admin.shipped_orders',compact('Shipped_Item'));
  }
  public function dj()
  {
      $dj_banners = Dj::all();
    return view('admin.dj_banner', compact('dj_banners'));
  }
  public function createDJ()
  {
   return view('admin.create_dj_banner');
  }
  public function storeDJ()
  {

    $data = request()->validate([
      'banner_image' =>'required'
    ]);



    if (request()->hasFile('banner_image')) {
      $dj_banner = request()->file('banner_image');
      $dj_banner_name = time(). 'dj.'.$dj_banner->extension();
      $dj_banner->move(public_path('images'), $dj_banner_name);
  }

  $dj = new Dj();
  $dj->image = $dj_banner_name;
  $dj->save();
  return redirect('/admin/dj')->with('success','Image saved successfully');
  }

 public function deleteDJ(Dj $image)
 {
  $image->delete();

  if(file_exists(public_path('images/'. $image->image))){

    unlink(public_path('images/' . $image->image));
   return redirect('/admin/dj')->with('success','Image saved successfully');

  }
  
 }
public function invoice($orderId)
{
  $order = Order::where('id',$orderId)->first();
  $data = [
    'order' => $order,
  ];
  
 $pdf= Pdf::loadView('admin.invoice',$data);
 return $pdf->download('Invoice.pdf');
}

}
