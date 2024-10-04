<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Rules\Alpha;
use Illuminate\Support\Facades\Validator;


class SubCategoryController extends Controller
{
    public function index(){

        $subcategories = SubCategory::with('category')->get();

        return view("Admin.SubCategory.sub-category",compact('subcategories'));

    }

    public function create(){

        $categories = Category::latest()->get();

        

        return view("Admin.SubCategory.create",compact('categories'));

    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(),[
            'name' =>[ 'required','min:3', new Alpha],
            'slug' => 'required|unique:sub_categories',
            'category_id' => 'required|numeric',
            'status' => 'required',
    
           ]);

           if($validator->passes()){

            $subCategory = new SubCategory();
            $subCategory->name = $request->name;
            $subCategory->slug = $request->slug;
            $subCategory->category_id = $request->category_id;
            $subCategory->status = $request->status;
            $subCategory->save();

            $request->session()->flash('success','Sub Category Added Successfully');

            return response()->json([
                'status' => true,
                'msg' =>'Sub Category Added Successfully',
            ]);
    

           }
           else{

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
           }
    }

    public function edit(Request $request,$id){

        $subCategory = SubCategory::find($id);
        $categories = Category::latest()->get();

        if(empty($subCategory)){
            $request->session()->flash('error','Sub Category Not Found');

            return redirect()->route("Admin.sub-category");
        }

        return view('Admin.SubCategory.edit',compact('subCategory','categories'));

    }

    public function update(Request $request,$id){

        $subCategory = SubCategory::find($id);
       

        if(empty($subCategory)){
            $request->session()->flash('error','Sub Category Not Found');

            return redirect()->route("Admin.sub-category");
        }

        $validator = Validator::make($request->all(),[
            'name' => [ 'required','min:3', new Alpha],
            'slug' => 'required|unique:sub_categories,slug,' . $subCategory->id . ',id',
            'category_id' => 'required|numeric',
            'status' => 'required',
    
           ]);

           if($validator->passes()){

    
            $subCategory->name = $request->name;
            $subCategory->slug = $request->slug;
            $subCategory->category_id = $request->category_id;
            $subCategory->status = $request->status;
            $subCategory->update();

            $request->session()->flash('success','Sub Category Updated Successfully');

            return response()->json([
                'status' => true,
                'msg' =>'Sub Category Updated Successfully',
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
        $subCategory = SubCategory::find($id);

      
       

        if(empty($subCategory)){
            $request->session()->flash('error','Sub Category Not Found');

            return redirect()->route("Admin.sub-category");
        }


        $subCategory->delete();

        $request->session()->flash('success','Sub Category Deleted Successfully');

            return response()->json([
                'status' => true,
                'msg' =>'Sub Category Deleted Successfully',
            ]);

    }
}