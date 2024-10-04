<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand;
use App\Rules\Alpha;


class BrandController extends Controller
{
    public function index(){

        $brands = Brand::all();

       

        return view('Admin.Brand.brand',compact('brands'));
    }

    public function create(){

        return view('Admin.Brand.create');
    }

    public function store(Request $request){

       
       $validator = Validator::make($request->all(),[
        'name' => [ 'required','min:3', new Alpha],
        'slug' => 'required|unique:categories',
        'status' => 'required',

       ]);

       if($validator->passes()){

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = $request->slug;
        $brand->status = $request->status;
        $brand->save();

        $request->session()->flash('success','Brand Added Successfully');

        return response()->json([
            'status' => true,
            'msg' =>'Brand Added Successfully',
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

        $brand = Brand::find($id);

        if(empty($brand)){

        $request->session()->flash('error','Brand Not Found');

            return redirect()->route("Admin.brand");
        }

        return view('Admin.Brand.edit',compact('brand'));

    }

    public function update(Request $request,$id){
        $brand = brand::find($id);

        if(empty($brand)){

        $request->session()->flash('error','Brand Not Found');

            return redirect()->route("Admin.brand");
        }

        $validator = Validator::make($request->all(), [
            'name' => [ 'required','min:3', new Alpha],
            'slug' => 'required|unique:categories,slug,' . $brand->id . ',id',
            'status' => 'required',
        ]);
    
           if($validator->passes()){
    
           
            $brand->name = $request->name;
            $brand->slug = $request->slug;
            $brand->status = $request->status;
            $brand->update();
    
            $request->session()->flash('success','Brand Updated Successfully');
    
            return response()->json([
                'status' => true,
                'msg' =>'Brand Udated Successfully',
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

        $brand = Brand::find($id);

        if(empty($brand)){

        $request->session()->flash('error','Brand Not Found');

        return response()->json([
            'status' => false,
            'msg' =>'Brand Not  Found',
        ]);
        }

        $brand->delete();

        $request->session()->flash('success','Brand Delete Successfully');
        return response()->json([
            'status' => true,
            'msg' =>'Brand Delete Successfully',
        ]);


    }
}