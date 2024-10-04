<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\Alpha;
use App\Rules\PassowrdConfirm;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role','user')->get();
        return view('admin.users.index', compact('users'));
       
    }
    
    public function create()
    {
        return view('admin.users.create'); // User creation form
    }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(),[
            'name' => [ 'required','min:3', new Alpha],
            'email' => 'required|email',
            'contact' => 'required|numeric|digits:11',
            'password' => 'required|min:8',
            'password_confirmation' => [ new PassowrdConfirm('password')],
    
           ]);

           if($validator->passes()){
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'password' => Hash::make($request->password),
            ]);

            $request->session()->flash('success','User Added Successfully');

        return response()->json([
            'status' => true,
            'msg' =>'User Added Successfully',
        ]);
           }
           else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);

           }

       

       
    }

    public function edit(Request $request, $user)
    {
        $user = User::find($user);

        if(empty($user)){
            $request->session()->flash('error','User Not Found');

            return redirect()->route("admin.users.index");
        }
        return view('Admin.users.edit', compact('user')); // User edit form
    }

    public function update(Request $request, $user)
    {

        $user = User::find($user);

        if(empty($user)){
            $request->session()->flash('error','User Not Found');

            return redirect()->route("admin.users.index");
        }

        $validator = Validator::make($request->all(),[
            'name' => [ 'required','min:3', new Alpha],
            'email' => 'required|email',
            'contact' => 'required|numeric|digits:11',
    
           ]);

           if($validator->passes()){
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
               
            ]);

            $request->session()->flash('success','User Updted Successfully');

        return response()->json([
            'status' => true,
            'msg' =>'User Updted Successfully',
        ]);
           }
           else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);

           }
      
    }

    
    public function destroy(Request $request,$id){

        $user = User::find($id);

        if(empty($user)){

        $request->session()->flash('error','User Not Found');

        return response()->json([
            'status' => false,
            'msg' =>'User Not  Found',
        ]);
        }

        $user->delete();

        $request->session()->flash('success','User Delete Successfully');
        return response()->json([
            'status' => true,
            'msg' =>'User Delete Successfully',
        ]);


    }
}