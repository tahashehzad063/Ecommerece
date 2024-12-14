<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_catagory(){
      $category=Category::all();
        return view('admin.catagory',compact('category'));
    }
   
    public function add_category(Request $request){
      $category=new Category();
      $category->category_name=$request->category;
      $category->save();
      return redirect()->back()->with('message', 'Category Added Successfully');

    }
    public function delete_category($id){
      $post=Category::find($id);
      $post->delete();
      return redirect()->back()->with('message', 'Category Deleted Successfully');
    }
    public function edit_category($id){
      // $categories = Category::all();
      $post = Category::find($id); 
      return view('admin.edit_page',compact('post'));
    }
    public function update_post(Request $request, $id){
      $data = Category::find($id);
  
      $data->category_name = $request->title;
     
      $data->save();
  
      return redirect()->back();
  }
  public function view_products(){
    $category= Category::all();
    return view ('products.products',compact('category'));
  }
  public function add_product(Request $request){
$product=new Product();
$product->title=$request->title;
$product->description=$request->description;
$product->price=$request->price;
$product->quantity=$request->quantity;
$product->discount_price=$request->dis_price;
$product->category = $request->category;
$image=$request->image;
$imagename=time().'.'.$image->getClientOriginalExtension();
$request->image->move('product',$imagename);
$product->image=$imagename;
$product->save();
return redirect()->back()->with('message', 'Product Added Successfully');
  }
    public function show_product(){
      $product = Product::paginate(7);
      return view ('products.show_product',compact('product'));
    }
  public function delete_product($id){
    $product=Product::find($id);
    $product->delete();
    return redirect()->back()->with('message', 'Product Deleted Successfully');
 

  }
  public function edit_product($id){
    $product=Product::find($id);
    $category=Category::all();
    return view('products.edit_product',compact('product','category'));
  }
  public function update_product(Request $request,$id){
$product=Product::find($id);

$product->title=$request->title;
$product->description=$request->description;
$product->price=$request->price;
$product->quantity=$request->quantity;
$product->discount_price=$request->dis_price;
$product->category = $request->category;

$image = $request->image;

if ($image) {
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $image->move('product', $imageName);
    $product->image = $imageName;
} else {
    // If no new image is provided, keep the previous image
    $product->image = $product->image;
}

// The rest of your code...

$product->save();
return redirect()->back()->with('message', 'Product Updated Successfully');
  }

}
  