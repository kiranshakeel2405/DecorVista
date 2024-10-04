<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Blog;
use App\Models\TempImage;
use App\Rules\Alpha;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;


class BlogController extends Controller
{
    public function index(){

        $blogs = Blog::all();

       

        return view('Admin.Blog.blog',compact('blogs'));
    }

    public function create(){

        return view('Admin.Blog.create');
    }

    public function store(Request $request){

       
       $validator = Validator::make($request->all(),[
        'title' => ['required', 'string', 'min:3'],
        'slug' => ['required', 'string', 'unique:blogs'],
        'description' => ['required', 'string'],
        'short_description' => ['required', 'string'],
        'status' => 'required',

       ]);

       if($validator->passes()){

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->description = $request->description;
        $blog->short_description = $request->short_description;
        $blog->status = $request->status;
        $blog->save();

        if($request->image_id != ""){
            $tempimginfo = TempImage::find($request->image_id);
            $extArray = explode('.',$tempimginfo->image);
            $ext = last($extArray);
           


            $ImageName = $blog->id.'-'.'-'.time().'.'.$ext;
            $blog->image = $ImageName;
            $blog->save();;



            // Generate thumbnail

            //large
                   $Spath = public_path().'/temp/'.$tempimginfo->image;
                 
                    $dpath = public_path().'/uploads/Blog/large/'.$ImageName;
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($Spath);
                    $image->scaleDown(1400);
                    $image->save($dpath);
                    



                    //small
                    $dpath = public_path().'/uploads/Blog/small/'.$ImageName;
                    $image->cover(430,430);
                    $image->save($dpath);
        }

        $request->session()->flash('success','Blog Added Successfully');

        return response()->json([
            'status' => true,
            'msg' =>'Blog Added Successfully',
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

        $blog = Blog::find($id);

        if(empty($blog)){

        $request->session()->flash('error','Blog Not Found');

            return redirect()->route("Admin.blog");
        }

        return view('Admin.Blog.edit',compact('blog'));

    }

    public function update(Request $request,$id){
        $blog = Blog::find($id);

        if(empty($blog)){

        $request->session()->flash('error','Blog Not Found');

            return redirect()->route("Admin.blog");
        }

        $validator = Validator::make($request->all(),[
            'title' => ['required', 'string', 'min:3'],
            'slug' => ['required', 'string', 'unique:blogs,slug,' . $blog->id . ',id'],
            'description' => ['required', 'string'],
            'short_description' => ['required', 'string'],
            'status' => 'required',
    
           ]);
    
           if($validator->passes()){

                $blog->title = $request->title;
                $blog->slug = $request->slug;
                $blog->description = $request->description;
                $blog->short_description = $request->short_description;
                $blog->status = $request->status;
                $blog->update();

                $OldImageName = $blog->image;

                if($request->image_id != ""){
                    $tempimginfo = TempImage::find($request->image_id);
                    $extArray = explode('.',$tempimginfo->image);
                    $ext = last($extArray);
                   
        
        
                    $ImageName = $blog->id.'-'.'-'.time().'.'.$ext;
                    $blog->image = $ImageName;
                    $blog->save();;
        
        
                    File::delete(public_path('/uploads/Blog/large/'.$OldImageName));
                    File::delete(public_path('/uploads/Blog/small/'.$OldImageName));
                    // Generate thumbnail
        
                    //large
                           $Spath = public_path().'/temp/'.$tempimginfo->image;
                         
                            $dpath = public_path().'/uploads/Blog/large/'.$ImageName;
                            $manager = new ImageManager(new Driver());
                            $image = $manager->read($Spath);
                            $image->scaleDown(1400);
                            $image->save($dpath);
                            
        
        
        
                            //small
                            $dpath = public_path().'/uploads/Blog/small/'.$ImageName;
                            $image->cover(430,430);
                            $image->save($dpath);
                }
    
            $request->session()->flash('success','blog Updated Successfully');
    
            return response()->json([
                'status' => true,
                'msg' =>'blog Udated Successfully',
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

        $blog = Blog::find($id);

        if(empty($blog)){

        $request->session()->flash('error','Blog Not Found');

        return response()->json([
            'status' => false,
            'msg' =>'Blog Not  Found',
        ]);
        }
        if(!empty($blog->image)){
            
            File::delete(public_path('/uploads/Blog/large/'.$blog->image));
            File::delete(public_path('/uploads/Blog/small/'.$blog->image));

              
        }
        $blog->delete();

        $request->session()->flash('success','Blog Delete Successfully');
        return response()->json([
            'status' => true,
            'msg' =>'Blog Delete Successfully',
        ]);


    }
}