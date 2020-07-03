<?php

namespace App\Http\Controllers\admin\recharge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Recharge;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;
class RechargeController extends Controller
{
    function index(){
        $recharges = Recharge::all();
        return view('admin.recharge.index', ['recharges' => $recharges]);
    }
    function edit($id, Request $request){

        $ac =$request->action;
        $mo =$request->money;
        $idu =$request->user;
        $recharge= Recharge::find($id);
            $recharge->action="yes";
            $recharge->save();
            $user = User::find($idu);
            $user->money=$user->money+$mo;
            $user->save();
            $mes=new Message();
            $mes->id_user=$idu;
            $mes->content="Yêu cầu nạp ".$mo." vnđ vào tài khoản của bạn đã thành công.";
            $mes->save();

        return redirect('admin/recharge/');
    }
    function destroy($id){
        $recharge= Recharge::find($id);
        $recharge->delete();
        return redirect('admin/recharge/');
    }
}
