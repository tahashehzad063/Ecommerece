<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Illuminate\Support\Facades\Session;
// use Session;
use Stripe;
use Stripe\Exception\CardException;

class OrderController extends Controller
{
    public function cash_order(){
        $user=Auth::user();
        $userid=$user->id;
        // dd($userid);
        $data=Cart::where('user_id','=',$userid)->get();
        // dd($data);
        foreach($data as $data){
            $order=new Order();
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;
            $order->payment='cash on delivery';
            $order->delivery_status='processing';
            $order->save();
            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message','Add Order Successfully');
    }
    // public function stripe($totalprice){
    //     return view('home.stripe',compact('totalprice'));
    // }
    // // public function stripePost(Request $request,$totalprice)
    // // {
    //     public function stripePost(Request $request)
    //     {
    //         Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
    //         Stripe\Charge::create ([
    //                 "amount" => 100 * 100,
    //                 "currency" => "usd",
    //                 "source" => $request->stripeToken,
    //                 "description" => "Test payment from itsolutionstuff.com." 
    //         ]);
          
    //         Session::flash('success', 'Payment successful!');
                  
    //         return back();
    //     }
    public function stripe($totalprice){
        
        return view ( 'home.stripe',compact('totalprice') )->with('message','Add Order Successfully');
    }
    //
    public function call(Request $request,$totalprice) {
        // try{

            \Stripe\Stripe::setApiKey('sk_test_51Oby6DBmB1lrLg6Wb1ob42zmToG6cjmbD2O9T0Ky2r3HgqGUjhVmXqGkFcRRlE7MfFgLYjtvRWtsZv2P4YnIZDal00SnPyxwtf');
            $customer = \Stripe\Customer::create(array(
                'name' => 'test',
                'description' => 'test description',
                'email' => 'email@gmail.com',
                'source' => $request->input('stripeToken'),
                "address" => ["city" => "San Francisco", "country" => "US", "line1" => "510 Townsend St", "postal_code" => "98140", "state" => "CA"]
                
            ));
        // }catch(Exception $e){
            // return redirect()->back();
        // }
      $user=Auth::user();
      $userid=$user->id;
      // dd($userid);
      $data=Cart::where('user_id','=',$userid)->get();
      // dd($data);
      foreach($data as $data){
          $order=new Order();
          $order->name=$data->name;
          $order->email=$data->email;
          $order->phone=$data->phone;
          $order->address=$data->address;
          $order->user_id=$data->user_id;
          $order->product_title=$data->product_title;
          $order->price=$data->price;
          $order->quantity=$data->quantity;
          $order->image=$data->image;
          $order->product_id=$data->product_id;
          $order->payment='Payment By Card';
          $order->delivery_status='Paid';
          $order->save();
          $cart_id=$data->id;
          $cart=Cart::find($cart_id);
          $cart->delete();
      }
        try {
            \Stripe\Charge::create ( array (
                    "amount" => $totalprice * 100,
                    "currency" => "usd",
                    "customer" =>  $customer["id"],
                    "description" => "Test payment."
            ) );
            Session::flash ( 'success-message', 'Payment done successfully !' );
            return view ( 'home.stripe',compact('totalprice') )->with('message','Add Order Successfully');
        } catch ( \Stripe\Error\Card $e ) {
            Session::flash ( 'fail-message', $e->get_message() );
            return view ( 'home.stripe' ,compact('totalprice'))->with('message','Add Order Successfully');
        }
        return redirect()->back()->with('message','Add Order Successfully');
    }
   
    }

