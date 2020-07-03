<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
class ProductController extends Controller
{
   function index(){
     $products = Product::all();
     foreach($products as $product){
       $product->category;
     }
        return view('admin.product.index', ['products' => $products]);	
    }
    	  function edit($id){
      		$product = Product::find($id); 
          $product->category->name;
      return view("admin/product/edit",['product'=>$product]);
    }
    
     function update($id, Request $request){
	 	$status = $request->input('status');
	 	$quantity = $request->input('quantity');
	 	if($quantity==0){
	 		$status="Đã bán";
	 	}
	 	else if($quantity>0){
	 		$status = "Còn";
	 	}
      $image = $request->file('image')->store('public');
	    $name = $request->input('name');
	    $price= $request->input('price');
	    $oldprice = $request->input('oldprice'); 
	    $source = $request->input('source');
      $description = $request->input('description');
      $id = Product::find($id)->category->id; 
      $product= Product::find($id);
      $product->name=$name;
      $product->price=$price;
      $product->oldprice=$oldprice;
      $product->source=$source;
      $product->description=$description;
      $product->status=$status;
      $product->quantity=$quantity;
      $product->image=$image;
      $product->id_category=$id;
      $product->save();
      return redirect('/admin/product/');
    }
     function destroy($ids){
   	 $product=Product::find($ids)->delete();
  	return redirect('admin/product/');
   }
   function create(){
    $categories=Category::all();
    return view("admin/product/create",['categories'=>$categories]);
   }
   function store(Request $Request){
    $name = $Request-> input("name");
    $oldprice = $Request-> input("oldprice");
    $source = $Request-> input("source");
    $quantity = $Request-> input("quantity");
    if($quantity==0){
      $status="Đã bán";
    }
    else if($quantity>0){
      $status = "Còn";
    }
    $description = $Request-> input("description");
    $image = $Request->file('image')->store('public');
   	$id = $Request-> input("category");
      $product= new Product();
      $product->name=$name;
      $product->price=$oldprice;
      $product->oldprice=$oldprice;
      $product->source=$source;
      $product->description=$description;
      $product->status=$status;
      $product->quantity=$quantity;
      $product->image=$image;
      $product->id_category=$id;
      $product->save();
	  return redirect('admin/product/');
	}
}