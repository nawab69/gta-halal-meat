<?php

namespace App\Http\Controllers\Site;

use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('site.pages.account.index',compact('user'));
    }

    public function getOrders()
    {
        $orders = auth()->user()->orders;

        return view('site.pages.account.orders', compact('orders'));
    }
    public function updateInfo(Request $request)
    {
        $data =  request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = Auth::user();

        $update = $user->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if($update){
            return back()->with('success', 'Your Account Has been Updated!');
        }else{
            return back()->with('warning', 'Your Account Has not been Updated!');
        }

    }

    public function editAddress(){
        $user = Auth::user();
        $address = Address::where('user_id',$user->id)->first();
        return view('site.pages.account.edit',compact('address','user'));
    }
    public function updateAddress(Request $request){
        $user = Auth::user();
        $address = Address::where('user_id',$user->id)->first();
        $update = $address->update($request->except('_token'));
        if($update){
            return back()->with('success', 'Your Address Has been Updated!');
        }else{
            return back()->with('warning', 'Your Address Has not been Updated!');
        }
    }

    public function orderDetails($id){
       $order = Order::where('order_number',$id)->first();
       return view('site.pages.account.show',compact('order'));
    }
}
