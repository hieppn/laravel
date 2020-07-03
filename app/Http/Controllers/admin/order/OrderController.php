<?php

namespace App\Http\Controllers\admin\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Older;
use App\Product;
use App\Cart;
use App\User;
use App\Message;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    function index(){
        $orders = Older::all();
      return view('admin.order.index',['orders'=>$orders]);
    }
    function edit($id, Request $request){

      $ac =$request->action;
      $ac1 =$request->action1;
      $idu=Older::where('id','=',$id)->value('id_user');
      $order= Older::find($id);
          $order->status="Giao hàng";
          $order->save();
          $mes=new Message();
          $mes->id_user=$idu;
          $mes->content="Hàng của bạn đang giao.";
          $mes->save();
      return redirect('admin/order/');
  }
  function show($id,Request $Request){
    $product = Product::find($id);
    $comments= Comment::where('id_product','=',$id)->get();
    foreach($comments as $comment){
        $comment->userc;
    }
    //echo "<pre>".json_encode($c,JSON_PRETTY_PRINT)."</pre>";
  return view("admin/order/detail",["product" => compact('product'),"comments"=>$comments]);
}
}