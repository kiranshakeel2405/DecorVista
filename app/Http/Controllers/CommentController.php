<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\Alpha;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        

        $Validator = Validator::make($request->all(),[
            'name' => ['required','min:3', new Alpha],
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]); 


        if($Validator->passes()){

            if (Auth::check() == false) {
                return response()->json(
                    [
    
                        'isLogin' => false,
                        'msg' => 'Add Comment First Login',
                    ]
                );


               
            }

          
            $user = Auth::user();


            Comment::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'product_id' => $request->id,
                ],
                [
                    'user_id' => $user->id,
                    'product_id' => $request->id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'comment' => $request->message,
                ]
            );
            


            $request->session()->flash('success','Your Comment Added Successfully');

            return response()->json([
                'status' => true,
                'msg' =>'Your Comment Added Successfully',
            ]);

        }

        else{

            return response()->json([
                'status' => false,
                'errors' => $Validator->errors(),
            ]);
        }

      

    }

}
