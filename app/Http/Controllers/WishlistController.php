<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    
    public function store (Request $request){

        if(Auth::check() == false){
            return response()->json([
                'status' => false,
                'isLogin' => false,
                'msg' => 'Add Wishlist to First Login',
            ]);
            
        }
        
        $user = Auth::user();

        $product = Product::find($request->id);

        Wishlist::updateOrCreate(
            [
                'user_id' => $user->id,
                'product_id' => $request->id,
            ],
            [
                'user_id' => $user->id,
                'product_id' => $request->id,
            ]
        );


        $message = "$product->name Add in your Wishlist ";

        $request->session()->flash('success',$message);
        return response()->json([
            'status' => true,
            'msg' => $message,
        ]);
        
    }

    
   
    public function destroy (Request $request , $id){

        $wishlist = Wishlist::find($id);
        $product = Product::find($wishlist->product_id);
        
        if(empty($wishlist)){
            return response()->json([
                'status' => false,
                'msg' => "Product Not Found" 
            ]);
        }

        $wishlist->delete();
        $message ="<strong>".$product->name."</strong> Remove Successfully in You Wishlists";

        $request->session()->flash("success",$message);
        return response()->json([
            'status' => true,
            'msg' => $message 
        ]);

    }
}