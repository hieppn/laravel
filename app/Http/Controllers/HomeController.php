<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\User;
use App\Cart;
use App\Recharge;
use App\Message;
use App\Older;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        foreach($categories as $category){
            $category->product;
        }
        $products = Product::all();
        foreach($products as $product){
          $product->category;
        }
        $id_user= Auth::user()->id;
        $carts = Cart::where('id_user', '=', $id_user)->get();
       return view('home',['products'=>$products,'carts'=>$carts,'categories'=>$categories]);
    }
    function show($id,Request $Request){
        $product = Product::find($id);
        $comments= Comment::where('id_product','=',$id)->get();
        foreach($comments as $comment){
            $comment->userc;
        }
        //echo "<pre>".json_encode($c,JSON_PRETTY_PRINT)."</pre>";
  		return view("user/detail",["product" => compact('product'),"comments"=>$comments]);
   }
    public function admin(Request $req){
        return view('middleware')->withMessage("Admin");
    }
    public function member(Request $req){
        return view('middleware')->withMessage("User");
    }
    function catelog($id,Request $Request){
        $category= Category::find($id);

        $products = Product::where('id_category','=',$id)->get();
        foreach($products as $product){
          $product->category;
        }
        $id_user= Auth::user()->id;
        $carts = Cart::where('id_user', '=', $id_user)->get();
       return view('products',['products'=>$products,'carts'=>$carts,'category'=>$category]);
    }
    function search(Request $Request){
        $key=$Request->input('keys');
        echo "<h1>Kết quả tìm kiếm cho từ khóa:" .$key."</h1>";
        $products=Product::where('name', 'like', '%' . $key . '%')->get();
       // echo "<pre>".json_encode($products,JSON_PRETTY_PRINT)."</pre>";
        return view('search',['products'=>$products,'key'=>$key]);
    }
    function sort(Request $Request){
        $sort=$Request->input('sort');
        if($sort=='giam'){
        $products=Product::orderBy('price', 'DESC')->get();
        }else{
            $products=Product::orderBy('price', 'ASC')->get();
        }
       // echo "<pre>".json_encode($products,JSON_PRETTY_PRINT)."</pre>";
        return view('sort',['products'=>$products]);
    }
    function profile($id, Request $request){
        $address = $request->input('address');
        $phone= $request->input('phone');
        $email = $request->input('email');
        $money = $request->input('money');
        if($money==Auth::user()->money)
        {
        $user=User::find($id);
        $user->address =$address;
        $user->phone =$phone;
        $user->email =$email;
        $user->save();
    }else{
        $user=User::find($id);
        $user->address =$address;
        $user->phone =$phone;
        $user->email =$email;
        $user->save();
        $recharge= new Recharge();
        $recharge->id_user=$id;
        $recharge->money=$money;
        $recharge->action="no";
        $recharge->save();
        $mes=new Message();
        $mes->id_user=$id;
        $mes->content="Bạn đã yêu cầu nạp ".$money." vnđ vào tài khoản.";
        $mes->save();
    }
        return redirect('home');
      }
      function message(){
          $user=Auth::user();
          $idu=$user->id;
          $messages=Message::where('id_user','=',$idu)->get();
          return redirect('home');
      }
      function read($id){
          $message= Message::find($id);
          $message->status="yes";
          $message->save();
          return redirect('home');
      }
      function destroymessage($id){
        $message= Message::find($id);
        $message->delete();
        return redirect('home');
    }
    function gave($id){
        $idu=Older::where('id','=',$id)->value('id_user');
        $order= Older::find($id);
            $order->status="Đã nhận hàng";
            $order->save();
            $mes=new Message();
            $mes->id_user=$idu;
            $mes->content="Cảm ơn bạn đã mua hàng. Xin để lại đánh giá của bạn.";
            $mes->save();
        return redirect('home');
    }
    
}