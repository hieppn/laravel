<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    function destroy($id){
        $comment=Comment::find($id);
        $comment->delete();
        return redirect("home");
    }
    function edit($id,Request $request){
        $cmtt=$request->cmtt;
        $comment=Comment::find($id);
        $comment->cmt=$cmtt;
        $comment->save();
       return redirect("home");
    }
    function add($id,Request $request){
        $cmtt=$request->cmtt1;
        $comment = new Comment();
        $comment->id_product=$id;
        $comment->id_user=Auth::user()->id;
        $comment->cmt=$cmtt;
        $comment->save();
        return redirect("home");
    }
}
