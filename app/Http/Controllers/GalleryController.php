<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Validator;
use App\Models\SubCategory;
use App\Models\TempImage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $galleries = Gallery::with(['images','subcategory'])->get();
    
        return view('Admin.Gallery.gallery',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subCategories = SubCategory::latest()->get();
        return view('Admin.Gallery.create',compact('subCategories'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'subcategory_id' => 'required|numeric',
            'description' => 'required|min:15',
            'status' => 'required',
    
           ]);

           if($validator->passes()){

            $gallery = new Gallery();
            $gallery->subCategory_id = $request->subcategory_id;
            $gallery->description = $request->description;
            $gallery->status = $request->status;
            $gallery->save();

            // Images Here
            if(!empty($request->img_array)){
                $length = count($request->img_array);
                  if($length > 4){
                    return response()->json([
                        'ImageLimit' => false,
                        'error' => 'You can only upload a maximum of 4 images.',
                    ]);
                  }

                foreach($request->img_array as $tempimgid){

                    $tempimginfo = TempImage::find($tempimgid);
                    $extArray = explode('.',$tempimginfo->image);
                    $ext = last($extArray);
                    $galleryImage = new GalleryImage();
                    $galleryImage->gallery_id = $gallery->id;
                    $galleryImage->image = 'null';
                    $galleryImage->save();


                    $ImageName = $gallery->id.'-'.$galleryImage->id.'-'.time().'.'.$ext;
                    $galleryImage->image = $ImageName;
                    $galleryImage->save();



                    // Generate thumbnail

                    //large
                    $Spath = public_path().'/temp/'.$tempimginfo->image;
                    $dpath = public_path().'/uploads/gallery/large/'.$ImageName;
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($Spath);
                    $image->scaleDown(1400);
                    $image->save($dpath);
                    



                    //small
                    $dpath = public_path().'/uploads/gallery/small/'.$ImageName;
                    $image->cover(300,300);
                    $image->save($dpath);
                }
            }

            $request->session()->flash('success','Galley Added Successfully');
    
            return response()->json([
                'status' => true,
                'msg' =>'Gallery Added Successfully',
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
     * Display the specified resource.
     */
    public function show(Request $request,string $id)
    {
        $gallery = Gallery::with(['images','subcategory'])->find($id);

       
       
       

        return view('Admin.Gallery.view',compact('gallery'));
    }

   
    public function edit(string $id)
    {
        $gallery = Gallery::find($id);

        if(empty($gallery)){
            $request->session()->flash('error','Gallery Not Found');

            return redirect()->route("Admin.gallery");
        }

        $subCategories = SubCategory::latest()->get();
        $galleryImages = GalleryImage::where('gallery_id',$gallery->id)->get();
        return view('Admin.Gallery.edit',compact('gallery','subCategories','galleryImages'));
    }

    public function DeleteImage(Request $request)
    {

        $galleryImage = GalleryImage::find($request->id);
        if(empty($galleryImage)){
            return response()->json([
                'status' => false,
                'msg' => 'Image not found'
            ]);
        }

        File::delete(public_path('uploads/gallery/large/'.$galleryImage->image));
        File::delete(public_path('uploads/gallery/small/'.$galleryImage->image));


        $galleryImage->delete();

        return response()->json([
            'status' => true,
            'msg' => 'Image Deleted Successfully'
        ]);
    }

    public function ImageUpdate(Request $request)
    {

        $ImageLength = GalleryImage::where('gallery_id',$request->gallery_id)->count();
      
        if($ImageLength == 4){
            return response()->json([
                'ImageLimit' => false,
                'error' => 'You can only upload a maximum of 4 images.',
            ]);
          }
       
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $Spath = $image->getPathName();
          

        $galleryImage = new GalleryImage();
        $galleryImage->gallery_id = $request->gallery_id;
        $galleryImage->image = 'null';
        $galleryImage->save();

        $ImageName = $request->gallery_id.'-'.$galleryImage->id.'-'.time().'.'.$ext;
        $galleryImage->image = $ImageName;
        $galleryImage->save();

          // Generate thumbnail

                    //large
                    $dpath = public_path().'/uploads/gallery/large/'.$ImageName;
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($Spath);
                    $image->scaleDown(1400);
                    $image->save($dpath);



                    //small
                    $dpath = public_path().'/uploads/gallery/small/'.$ImageName;
                    $image->cover(300,300);
                    $image->save($dpath);
                    return response()->json([
                        'status' => true,
                        'Image_id' => $galleryImage->id, 
                        'Image_path' => asset('uploads/gallery/small/'.$galleryImage->image) ,
                        'msg' => 'Image Added Successfully'
                    ]);
        


    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::find($id);

        if(empty($gallery)){
            $request->session()->flash('error','Gallery Not Found');

            return redirect()->route("Admin.gallery");
        }
        $validator = Validator::make($request->all(),[
            'subcategory_id' => 'required|numeric',
            'description' => 'required|min:15',
            'status' => 'required',
    
           ]);

           if($validator->passes()){

          
            $gallery->subCategory_id = $request->subcategory_id;
            $gallery->description = $request->description;
            $gallery->status = $request->status;
            $gallery->update();

            

            $request->session()->flash('success','Galley Updated Successfully');
    
            return response()->json([
                'status' => true,
                'msg' =>'Gallery Updated Successfully',
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
    public function destroy(Request $request, string $id)
    {
        
        $gallery = Gallery::find($id);
        if(empty($gallery)){
        $request->session()->flash('error','Gallery Not Found');
            return response()->json([
            'status' => false,
            'NotFound' => true,
            ]);
        }

        $galleryImages = GalleryImage::where('gallery_id',$id)->get();

        if(!empty($galleryImages)){
            foreach($galleryImages as $galleryImage){
               File::delete(public_path('uploads/gallery/large/'.$galleryImage->image));
               File::delete(public_path('uploads/gallery/small/'.$galleryImage->image));
            }
           GalleryImage::where('gallery_id',$id)->delete();
        }
        $gallery->delete();
        $request->session()->flash('success','Gallery will be Deleted Successfully');
        return response()->json([
            'status' => true,
            'msg' => 'Gallery will be Deleted Successfully',
            ]);
    }


    
}