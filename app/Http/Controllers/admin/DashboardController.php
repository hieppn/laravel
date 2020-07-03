<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Product;
use App\Older;
use App\Category;
use App\Recharge;
use App\Discount;
class DashboardController extends Controller
{
    function index(){
        $products= Product::all();
        $users= User::all();
        $categories=Category::all();
        $recharges= Recharge::all();
        $orders=Older::all();
    	return view("admin.dashboard",['products'=>$products,'categories'=>$categories,'recharges'=>$recharges,'users'=>$users,'orders'=>$orders]);
    }
    function profile($id, Request $request){
        $address = $request->input('address');
        $phone= $request->input('phone');
        $email = $request->input('email');
        $user=User::find($id);
        $user->address =$address;
        $user->phone =$phone;
        $user->email =$email;
        $user->save();
        return redirect('admin/dashboard');
      }
      function maxpr(){
          $orders=Older::all();
          $a=0;$max=0;
          foreach($orders as $order){
        $products = json_decode($order->detail);
        foreach($products as $product){
            $product[0]->id;
        }
        }
      }
}