<?php

namespace App\Http\Controllers;
use App\Models\Style;
use Illuminate\Support\Facades\Validator;
use App\Rules\Alpha;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $styles = Style::latest()->get();
        
        return view('Admin.Style.style',compact('styles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Style.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required','min:3', new Alpha],
            'slug' => 'required|unique:styles',
            'status' => 'required',
    
           ]);
    
           if($validator->passes()){
    
            $style = new Style();
            $style->name = $request->name;
            $style->slug = $request->slug;
            $style->status = $request->status;
            $style->save();
    
            $request->session()->flash('success','Style Added Successfully');
    
            return response()->json([
                'status' => true,
                'msg' =>'Style Added Successfully',
            ]);
    
           }
           else{
    
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
           }
    }

    
    public function edit(Request $request, string $id)
    {
        $style = Style::find($id);

        if(empty($style)){

        $request->session()->flash('error','Style Not Found');

            return redirect()->route("Admin.style");
        }

        return view('Admin.Style.edit',compact('style'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $style = Style::find($id);

        if(empty($style)){

        $request->session()->flash('error','Style Not Found');

            return redirect()->route("Admin.style");
        }

        $validator = Validator::make($request->all(),[
            'name' => ['required','min:3', new Alpha],
            'slug' => 'required|unique:styles,slug,'.$style->id.',id',
            'status' => 'required',
    
           ]);
    
           if($validator->passes()){
    
          
            $style->name = $request->name;
            $style->slug = $request->slug;
            $style->status = $request->status;
            $style->save();
    
            $request->session()->flash('success','Style Updated Successfully');
    
            return response()->json([
                'status' => true,
                'msg' =>'Style Updated Successfully',
            ]);
    
           }
           else{
    
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , string $id)
    {
        $style = Style::find($id);

        if(empty($style)){

        $request->session()->flash('error','Style Not Found');

            return redirect()->route("Admin.style");
        }

        $style->delete();

        $request->session()->flash('success','Style Delete Successfully');
        return response()->json([
            'status' => true,
            'msg' =>'Style Delete Successfully',
        ]);
    }
}