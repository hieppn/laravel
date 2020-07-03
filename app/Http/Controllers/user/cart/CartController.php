<?php

namespace App\Http\Controllers\user\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Cart;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
       function index(){
        if(Auth::user()){
            $iduser=Auth::user()->id;
            $carts=Cart::where('id_user', '=', $iduser)->get();
            foreach($carts as $cart){
                $cart->product;
                $cart->user;
            }
           // $products=Cart::find(2)->product;
            // echo $user;
            // var_dump($products); 'products'=>$products
            //echo "<pre>".json_encode($carts,JSON_PRETTY_PRINT)."</pre>";
          
        }
        return view('user.cart',['carts'=>$carts]);

    }
    function store($idproduct){
        $iduser = Auth::user()->id;
        $cart=Cart::where('id_user', '=', $iduser)->where('id_product',$idproduct)->first();
        if($cart){
            $product = Product::where('id','=',$idproduct)->first();
                if($cart->quantity<$product->quantity){
                    $cart->quantity =$cart->quantity+1;
                }else{
                    $cart->quantity =$cart->quantity;
                } 
                $cart->save();
        }else{
                $cartn=new Cart();
                $cartn->id_user=$iduser;
                $cartn->id_product=$idproduct;
                $product = Product::where('id','=',$idproduct)->first();
                    $cartn->quantity=1;
                    $cartn->save();
                }
        return redirect('home');
    }
    function destroy($idproduct){
        $cart = Cart::where('id_product','=',$idproduct)->first();
        $product = Product::where('id','=',$idproduct)->first();
        $product->quantity=$cart->quantity;
        $product->save();
        $cart->delete();
        return redirect('cart');
    }
    function update($idproduct, Request $request){
        $cart = Cart::where('id_product','=',$idproduct)->first();
            $qua = Product::where('id','=',$idproduct)->value('quantity');
            $quan=$request->input('quantity');
            $sl=$request->input('sl');
            if($sl=='Tăng'){
                if($quan<$qua)
                $cart->quantity=$quan+1;
                else
                $cart->quantity =$qua;
                $cart->save();
            }
            if($sl=='Giảm'){
                if($quan>1){
                $cart->quantity =$quan-1;
                $cart->save();
                }
                else if($quan==1){
                    $cart->delete();
                }
                // $cart->quantity =$qua;
                // $cart->save(); 
            }
           
           return redirect('cart');
        }  
    
}