<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CouponsToken;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WishlistController extends Controller
{

public function add_wishlist(Request $request,$id){
    if(Auth::id()){
        $user=Auth::user();
        // dd($user);
        $product=Product::find($id);
        // dd(($product));
        $cart = new Wishlist();
        $cart->name=$user->name;
        $cart->email=$user->email;
        $cart->phone=$user->phone;
        $cart->address=$user->address;
        $cart->user_id=$user->id;
        $cart->product_title=$product->title;
        if ($product->discount_price != null) {
            $cart->price = $product->discount_price * ($request->quantity ?? 1);
        } else {
            $cart->price = $product->price * ($request->quantity ?? 1);
        }

        $cart->image=$product->image;
        $cart->product_id=$product->id;
        // $cart->quantity=$request->quantity;
$cart->save();
Alert::warning('Wishlist  Updated Successfully','We have Added Product To Wishlist');
return redirect()->back();
    }
    else{
        return redirect('login');
    }

}

public function show_wishlist(){
    if(Auth::id()){

        $id=Auth::user()->id;

        $cart=Wishlist::where('user_id','=',$id)->get();
        return view('home.show_wishlist',compact('cart'));
    }
    else{
        return redirect('login');
    }
}
public function update_wishlist(Request $request, $itemId)
{
    $request->validate([
        'quantity' => 'nullable|integer|min:1',
    ]);

    // Find the Wishlist item by ID
    $wishlistItem = Wishlist::find($itemId);

    // Check if the item exists before attempting to update
    if ($wishlistItem) {
        $wishlistItem->update(['quantity' => $request->quantity]);
    } else {
        // Handle the case where the item doesn't exist
        // You may want to log an error or take appropriate action
    }

    return redirect()->back();
}


public function wishl($id){
    $cart=Wishlist::find($id);
    $cart->delete();
    return redirect()->back()->with('message', 'Product Remove From Wishlist ');
      }

      public function add_to_cart(Request $request, $id)
      {
          if (Auth::id()) {
              $user = Auth::user();
              $userid=$user->id;
              // Find the product by ID
              $product = Wishlist::find($id);
              $data=Wishlist::where('user_id','=',$userid)->get();
              // Check if the product exists
              if ($product) {
                // $ts=Wishlist::all();
                foreach($data as $data){
                  $cart = new Cart();
                  $cart->name = $user->name;
                  $cart->email = $user->email;
                  $cart->phone = $user->phone;
                  $cart->address = $user->address;
                  $cart->user_id = $user->id;
                  $cart->product_title = $product->product_title;

                $cart->price=$product->price;

                    $cart->image = $product->image;
                    $cart->product_id = $product->id;
                    $cart->quantity = $product->quantity;

                    $cart->save();
                //   dd($request->all());
                $cart_id=$data->id;
                $car=Wishlist::find($cart_id);
                $car->delete();}
                  Alert::warning('Product Added Successfully', 'We have Added Product To cart');
                  return redirect()->back();
              } else {
                  // Handle the case where the product with the specified ID is not found
                  Alert::error('Product Not Found', 'The product you are trying to add to the cart does not exist.');
                  return redirect()->back();
              }
          }
      }
      public function show_coupon(){
        $product = CouponsToken::paginate(7);
        return view ('coupon.show_coupon',compact('product'));
      }
      public function delete_coupon($id){
        $product=CouponsToken::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Coupon Deleted Successfully');


      }
      public function edit_coupon($id){
        $product=CouponsToken::find($id);
        // $category=CouponsToken::all();
        return view('coupon.edit_coupon',compact('product'));
      }


  public function update_coupon(Request $request,$id){
    $discountCode=CouponsToken::find($id);

    // $discountCode = new CouponsToken();/
                $discountCode->code = $request->code;
                $discountCode->name = $request->name;
                $discountCode->description = $request->description;
                $discountCode->max_uses = $request->max_uses;
                $discountCode->max_uses_users = $request->max_uses_users;
                $discountCode->type = $request->type;
                $discountCode->discount_amount = $request->discount_amount;
                $discountCode->min_amount = $request->min_amount;
                $discountCode->status = $request->status;
                $discountCode->starts_at = $request->starts_at;
                $discountCode->expires_at = $request->expires_at;
    $discountCode->save();
    return redirect()->back()->with('message', 'Coupon Updated Successfully');
      }


      

      public function add_cart_size(Request $request, $id)
      {
          // Find the cart item
          $cart = Cart::findOrFail($id);

          // If the original price is not set, set it to the current price
          if (!$cart->original_price) {
              $cart->original_price = $cart->price;
          }

          // Update the size
          $cart->size = $request->size;

          // Update the price based on the selected size
          switch ($request->size) {
              case 0:
                  $cart->price = $cart->original_price; // Reset price to original value
                  break;
              case 1:
                  $cart->price = $cart->original_price * 1.5; // Update price for medium size
                  break;
              case 2:
                  $cart->price = $cart->original_price * 2; // Update price for large size
                  break;
          }

          // Save the changes
          $cart->save();

          return redirect()->back()->with('message', 'Size and price updated successfully');
      }



}
