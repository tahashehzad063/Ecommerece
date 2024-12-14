<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\CouponsToken;
use App\Models\DiscountCoupon;
use App\Models\Order;
use App\Notifications\SendEmailNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PDF;
class CoronaController extends Controller
{
    public function order(){
        $order=Order::paginate(5);
        return view('admin.order',compact('order'));
    }
    public function deliver($id){
        $deli=Order::find($id);
        $deli->delivery_status="delivered";
        $deli->payment="Paid";
        $deli->save();
        return redirect()->back();
    }
    public function print_pdf($id){
        $order=Order::find($id);
$pdf=PDF::loadView('admin.pdf',compact('order'));
return $pdf->download('order_details.pdf');
    }
    public function send_email($id){
        $order=Order::find($id);
return view('admin.email',compact('order'));
    }
    public function send_user_email(Request $request,$id){
$order=Order::find($id);
$details=[
    'greeting' => $request->greeting,
    'firstline' => $request->firstline,
    'body' => $request->body,
    'button' => $request->button,
    'url' => $request->url,
    'lastline' => $request->lastline,
];
$order->notify(new SendEmailNotification($details));
return redirect()->back();
    }
    public function search(Request $request){
        $search=$request->search;
        $order = Order::where('name', 'LIKE', '%' . $search . '%')->paginate(5);
        $order = Order::where('email', 'LIKE', '%' . $search . '%')->paginate(5);
        $order = Order::where('payment', 'LIKE', '%' . $search . '%')->paginate(5);
        $order = Order::where('delivery_status', 'LIKE', '%' . $search . '%')->paginate(5);

        return view('admin.order',compact('order'));
            }

public function show_order(){
if(Auth::id()){
    $user=Auth::user();
    $userid=$user->id;
    $order=Order::where('user_id','=',$userid)->get();
    return view('home.show_order',compact('order'));
}
else{
    return redirect('login');
}
            }
            public function cancel_order($id){
$cancel=Order::find($id);
$cancel->delivery_status='Cancelled';
$cancel->save();
return redirect()->back();
            }
            public function coupon(){
                return view('coupon.das');
            }
            public function store(Request $request)
            {
                // Validate the input
                $validator = Validator::make($request->all(), [
                    'code' => 'required',
                    'type' => 'required',
                    'discount_amount' => 'required|numeric',
                    'status' => 'required',
                ]);
            
                if ($validator->fails()) {
                    $errors = $validator->errors();
            
                    // You can customize the response or redirect as needed
                    return response()->json([
                        'status' => false,
                        'errors' => $errors,
                    ]);
                }
            
                // Your existing coupon creation logic
                $discountCode = new CouponsToken();
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
            
                if (!empty($request->starts_at) && !empty($request->expires_at)) {
                    $now = Carbon::now();
                    $startAt = Carbon::createFromFormat('Y-m-d H:i:s', $request->starts_at);
                    $expiresAt = Carbon::createFromFormat('Y-m-d H:i:s', $request->expires_at);
            
                    if ($expiresAt->lte($now)) {
                        return response()->json([
                            'status' => false,
                            'errors' => ['expires_at' => 'Expiration date cannot be less than the current time'],
                        ]);
                    }
                }
            
                $message = 'Discount Coupon Added Successfully';
                session()->flash('success', $message);
            
                return response()->json([
                    'status' => true,
                    'message' => $message,
                ]);
            }
            

public function showApplyCouponForm()
{
    return view('coupon.apply'); // Adjust based on your view file name
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

