<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Rules\Alpha;


class CategoryController extends Controller
{
    public function index(){

        $categories = Category::all();

       

        return view('Admin.Category.category',compact('categories'));
    }

    public function create(){

        return view('Admin.Category.create');
    }

    public function store(Request $request){

       
       $validator = Validator::make($request->all(),[
        'name' => [ 'required','min:3', new Alpha],
        'slug' => 'required|unique:categories',
        'status' => 'required',

       ]);

       if($validator->passes()){

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->save();

        $request->session()->flash('success','Category Added Successfully');

        return response()->json([
            'status' => true,
            'msg' =>'Category Added Successfully',
        ]);

       }
       else{

        return response()->json([
            'status' => false,
            'errors' => $validator->errors(),
        ]);
       }
    }

    public function edit(Request $request, $id){

        $category = Category::find($id);

        if(empty($category)){

        $request->session()->flash('error','Category Not Found');

            return redirect()->route("Admin.category");
        }

        return view('Admin.Category.edit',compact('category'));

    }

    public function update(Request $request,$id){
        $category = Category::find($id);

        if(empty($category)){

        $request->session()->flash('error','Category Not Found');

            return redirect()->route("Admin.category");
        }

        $validator = Validator::make($request->all(), [
            'name' => [ 'required','min:3', new Alpha],
            'slug' => 'required|unique:categories,slug,' . $category->id . ',id',
            'status' => 'required',
        ]);
    
           if($validator->passes()){
    
           
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;
            $category->update();
    
            $request->session()->flash('success','Category Updated Successfully');
    
            return response()->json([
                'status' => true,
                'msg' =>'Category Udated Successfully',
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

        $category = Category::find($id);

        if(empty($category)){

        $request->session()->flash('error','Category Not Found');

        return response()->json([
            'status' => false,
            'msg' =>'Category Not  Found',
        ]);
        }

        $category->delete();

        $request->session()->flash('success','Category Delete Successfully');
        return response()->json([
            'status' => true,
            'msg' =>'Category Delete Successfully',
        ]);


    }
}