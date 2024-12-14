<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContaceController extends Controller
{
    public function contact(){
        return view('home.contact');
    }
    public function contac(Request $request){
        if(Auth::id()){
            $user=Auth::user();
$contact=new Contact();
$contact->name=$request->name;
$contact->email=$request->email;
$contact->	phone   =$request->phone;
$contact->message=$request->message;
$contact->save();
return redirect()->back()->with('message','Send Message Successfully');
        }
    }
    public function all_messages(){
        $order=Contact::paginate(3);
        return view('admin.message',compact('order'));
    }
    public function searching(Request $request){
        $search=$request->search;
        $order = Contact::where('name', 'LIKE', '%' . $search . '%')->paginate(5);
        return  view('admin.message',compact('order'));
    }
}
