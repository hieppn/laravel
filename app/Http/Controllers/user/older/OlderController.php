<?php

namespace App\Http\Controllers\user\older;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Cart;
use App\Discount;
use App\Older;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;

class OlderController extends Controller
{
   function index(){
   	$idu = Auth::user()->id;
   	 $carts=Cart::where('id_user', '=', $idu)->get();
   	foreach($carts as $cart){
                $cart->product;
                $cart->user;
         }
    //echo "<pre>".json_encode($carts,JSON_PRETTY_PRINT)."</pre>";
   	return view('user.older',['carts'=>$carts]);
   }
   function check(Request $request){
      $sum=0;$a=0;
      $dis= $request->input('discount');
      //echo $dis;
      $idu = Auth::user()->id;
       $carts=Cart::where('id_user', '=', $idu)->get();
       foreach($carts as $cart){
         $cart->product;
         $cart->user;
         $products=$cart->product;
                foreach($products as $product){
                  $total= $product->price*$cart->quantity;
                  $sum+=$total;
                }
               
               
      $diss=Discount::all();
      foreach($diss as $disc){
         if($disc->code==$dis){
            $d=$disc->code;
            $a=$sum-(($disc->percent*$sum)/100);
         break;
         }else{
            $a=$sum;
            $d="";
         }
      }
      $cart->codec=$d;
      $cart->discount=$a;
   }
      return view('user.older',['carts'=>$carts]);
   }
   function store(Request $request){
      $dis= $request->input('dis');
      //$disc= $request->input('dis');
      $idu = Auth::user()->id;
      $carts=Cart::where('id_user', '=', $idu)->get();
      $s=0;$q=0;$giam=0;
      foreach( $carts as $cart){
            $q=$cart->quantity;
            $products=$cart->product;
            foreach($products as $product){
            $s+=$q*$product->price;
         }
      }
      $diss=Discount::all();
      $tam=0;
      foreach($diss as $disc){
         if($disc->code==$dis){
            $tam+=1;
            $pt=$disc->percent;
         break;
         }else{
            $tam=0;
         }  
      }
      if($tam==0){
         $giam=0;
         $a=$s;
      }
      else{
         $a=$s-(($pt*$s)/100);
         $giam= $s-$a;
      }
     
         $name=User::where('id', '=', $idu)->value('name');
         $phone=User::where('id', '=', $idu)->value('phone');
         $address=User::where('id', '=', $idu)->value('address');
         $email=User::where('id', '=', $idu)->value('email');
         $detail = array();
         foreach($carts as $cart){
            $idpr=$cart->id_product;
            $products=Product::where('id','=',$idpr)->get();
            array_push($detail, $products);
         }
         
         
         $order = new Older();
            $order->id_user=$idu;
            $order->phone=$phone;
            $order->name=$name;
            $order->address=$address;
            $order->email=$email;
            $order->discount=$giam;
            $order->detail= json_encode($detail);
            $order->status='cho ship';
            $order->total=$a;
       $order->save();
       
       foreach($carts as $cart){
       $idp=$cart->id_product;
            $product= Product::find($idp);
            $product->quantity= $product->quantity-$q;
            if($product->quantity>=1){
               $product->quantity=$product->quantity;
               $product->save();
            }
            else{
               $product->quantity=0;
               $product->status='Đã bán';
               $product->save();
          }
      $cart->delete()   ;
      $mes= new Message();
      $mes->id_user=$idu;
      $mes->content="Bạn đã thanh toán thành công. Vui lòng đợi shop duyệt và gửi hàng. Cảm ơn quý khách đã lựa chọn cửa hàng của chúng tôi.";
      $mes->save();
       }
      
      return redirect('home');
      
}
function hoadon(){
   $idu=Auth::user()->id;
   $orders = Older::where('id_user','=',$idu)->get();
 return view('user.hoadon',['orders'=>$orders]);
}
}