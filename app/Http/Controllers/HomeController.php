<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CouponsToken;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
class HomeController extends Controller
{
 

 public function index(){
    $product = Product::where('category', 'Shirt')
    ->orderBy('created_at', 'desc')
    ->paginate(3);
    $women = Product::where('category', 'Dress')
    ->orderBy('created_at', 'desc')
    ->paginate(3);
        

return view    ('home.userpage',compact('product','women'));
 }
 public function redirect()
 {
    // $product = Product::where('category', 'Shirt')
    // ->orderBy('created_at', 'desc')
    // ->paginate(3);
    // $women = Product::where('category', 'Dress')
    // ->orderBy('created_at', 'desc')
    // ->paginate(3);
        
     // Check if a user is authenticated
     if (Auth::check()) {
         $usertype = Auth::user()->usertype;
 
         // Check the usertype and redirect accordingly
         if ($usertype == '1') {
            $total = Product::all()->count();
            $order = Order::all()->count();
            $user = User::all()->count();
            $prices = Order::pluck('price');
            $revenue = 0;
            
            foreach ($prices as $price) {
                $revenue += $price; 
            }
            $delivery=Order::where('delivery_status','=','delivered')->get()->count();
            $process=Order::where('delivery_status','=','processing')->get()->count();
            $processing=Order::where('delivery_status','=','Paid')->get()->count();
            $unver = User::whereNull('email_verified_at')->count();
            return view('admin.home',compact('total','order','user','revenue','delivery','process','processing','unver'));
         } else {
            $product = Product::where('category', 'Shirt')
            ->orderBy('created_at', 'desc')
            ->paginate(3);
            $women = Product::where('category', 'Dress')
            ->orderBy('created_at', 'desc')
            ->paginate(3);
             return view('home.userpage',compact('product','women'));
         }
     } else {
         // User is not authenticated, handle this case (e.g., redirect to login page)
         return redirect()->route('login');
     }
 }
 
    public function compu(){
        $product = Product::where('category', 'Shirt')
        ->orderBy('created_at', 'desc')
        ->paginate(3);
        $women = Product::where('category', 'Dress')
        ->orderBy('created_at', 'desc')
        ->paginate(3);
        return view('home.userpage',compact('product','women'));
    }
    public function rem_product(){
        $product = Product::where('category', 'Shirt')
        ->orderBy('created_at', 'desc')
        ->paginate(3);
        $women = Product::where('category', 'Dress')
        ->orderBy('created_at', 'desc')
        ->paginate(3);
        $shoes = Product::where('category', 'Shoe')
        ->orderBy('created_at', 'desc')
        ->paginate(3);
        $bags = Product::where('category', 'Bags')
        ->orderBy('created_at', 'desc')
        ->paginate(3);
        return view('home.rem_product',compact('product','women','shoes','bags'));
    }
    public function product_details($id){
        $product=Product::find($id);
return view('home.product_details',compact('product'));
    }
public function add_cart(Request $request,$id){
    if(Auth::id()){
        $user=Auth::user();
        // dd($user);
        $product=Product::find($id);
        // dd(($product));
        $cart = new Cart();
        $cart->name=$user->name;
        $cart->email=$user->email;
        $cart->phone=$user->phone;
        $cart->address=$user->address;
        $cart->user_id=$user->id;
        $cart->product_title=$product->title;
        $cart->size=$request->type;
        if($product->discount_price!=null){

            $cart->price=$product->discount_price * $request->quantity;
        }
        else{
            $cart->price=$product->price * $request->quantity;
        }
        $cart->image=$product->image;
        $cart->product_id=$product->id;
        $cart->quantity=$request->quantity;
$cart->save();
Alert::warning('Product Added Successfully','We have Added Product To cart');
return redirect()->back();
    }
    else{
        return redirect('login');
    }

}
public function show_cart(){
    if(Auth::id()){

        $id=Auth::user()->id;
        
        $cart=Cart::where('user_id','=',$id)->get();
        return view('home.show_cart',compact('cart'));
    }
    else{
        return redirect('login');
    }
}
public function remove_cart($id){
    $cart=Cart::find($id);
    $cart->delete();
    return redirect()->back()->with('message', 'Product Remove From Cart ');
      }
      
public function applyCoupon(Request $request)
{
    // Validate the input
    $validator = Validator::make($request->all(), [
        'coupon_code' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors(),
        ]);
    }

    // Retrieve the coupon based on the provided code
    $coupon = CouponsToken::where('code', $request->coupon_code)->first();

    if (!$coupon) {
        return response()->json([
            'status' => false,
            'errors' => ['coupon_code' => 'Invalid coupon code'],
        ]);
    }

    // Check if the coupon is valid based on start and expiration dates
    $now = Carbon::now();
    $startAt = Carbon::createFromFormat('Y-m-d H:i:s', $coupon->starts_at);
    $expiresAt = Carbon::createFromFormat('Y-m-d H:i:s', $coupon->expires_at);

    if ($startAt->gt($now) || $expiresAt->lt($now)) {
        return response()->json([
            'status' => false,
            'errors' => ['coupon_code' => 'Coupon is not valid at this time'],
        ]);
    }

    // Apply the discount to your business logic
    $discountAmount = $coupon->discount_amount; // Adjust based on your business logic

    // Return success response with discount information
    return response()->json([
        'status' => true,
        'message' => 'Coupon applied successfully',
        'discount_amount' => $discountAmount,
    ]);
}

}
