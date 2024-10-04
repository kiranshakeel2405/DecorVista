<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Rules\Alpha;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\TempImage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); 
        $projects = Project::where('designer_id',$user->id)->latest()->with('images')->get();
        return view('Designer.Projects.projects',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Designer.Projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->img_array)){
            $length = count($request->img_array);
              if($length > 4){
                return response()->json([
                    'ImageLimit' => false,
                    'error' => 'You can only upload a maximum of 4 images.',
                ]);
              }
            }

        $validator = Validator::make($request->all(),[
            'title' => [ 'required','min:3', new Alpha],
            'slug' => 'required|unique:projects',
            'type' => [ 'required','min:3', new Alpha],
            'short_description' => 'required|min:10',
            'description' => 'required|min:10',
            'status' => 'required',
    
           ]);

           if($validator->passes()){

            $user = Auth::user();
             

            $project = new Project();
            $project->designer_id = $user->id;
            $project->title = $request->title;
            $project->slug = $request->slug;
            $project->project_type = $request->type;
            $project->short_description = $request->short_description;
            $project->description = $request->description;
            $project->status = $request->status;
            $project->save();


              // Images Here
             
                if(!empty($request->img_array)){
                    foreach($request->img_array as $tempimgid){

                        $tempimginfo = TempImage::find($tempimgid);
                        $extArray = explode('.',$tempimginfo->image);
                        $ext = last($extArray);
                        $projectImage = new ProjectImage();
                        $projectImage->project_id = $project->id;
                        $projectImage->image = 'null';
                        $projectImage->save();
    
    
                        $ImageName = $project->id.'-'.$projectImage->id.'-'.time().'.'.$ext;
                        $projectImage->image = $ImageName;
                        $projectImage->save();
    
    
    
                        // Generate thumbnail
    
                        //large
                        $Spath = public_path().'/temp/'.$tempimginfo->image;
                        $dpath = public_path().'/uploads/Projects/large/'.$ImageName;
                        $manager = new ImageManager(new Driver());
                        $image = $manager->read($Spath);
                        $image->scaleDown(1400);
                        $image->save($dpath);
                        
    
    
    
                        //small
                        $dpath = public_path().'/uploads/Projects/small/'.$ImageName;
                        $image->cover(500,500);
                        $image->save($dpath);
                    }
                }
               
            

            $request->session()->flash('success','Project Added Successfully');

            return response()->json([
                'status' => true,
                'msg' =>'Project Added Successfully',
            ]);

           }
           else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
           }

    }

   
    public function edit(string $id)
    {
        $project = Project::find($id);

        if(empty($project)){
            $request->session()->flash('error','Gallery Not Found');

            return redirect()->route("Designer.project");
        }

        $projectImages = ProjectImage::where('project_id',$project->id)->get();
        return view('Designer.Projects.edit',compact('project','projectImages'));
    }

    public function DeleteImage(Request $request)
    {

        $projectImage = ProjectImage::find($request->id);
        if(empty($projectImage)){
            return response()->json([
                'status' => false,
                'msg' => 'Image not found'
            ]);
        }

        File::delete(public_path('uploads/Projects/large/'.$projectImage->image));
        File::delete(public_path('uploads/Projects/small/'.$projectImage->image));


        $projectImage->delete();

        return response()->json([
            'status' => true,
            'msg' => 'Image Deleted Successfully'
        ]);
    }

    public function ImageUpdate(Request $request)
    {

        $ImageLength = ProjectImage::where('project_id',$request->project_id)->count();
      
        if($ImageLength == 4){
            return response()->json([
                'ImageLimit' => false,
                'error' => 'You can only upload a maximum of 4 images.',
            ]);
          }
       
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $Spath = $image->getPathName();
          

        $projectImage = new ProjectImage();
        $projectImage->project_id = $request->project_id;
        $projectImage->image = 'null';
        $projectImage->save();

        $ImageName = $request->project_id.'-'.$projectImage->id.'-'.time().'.'.$ext;
        $projectImage->image = $ImageName;
        $projectImage->save();

          // Generate thumbnail

                    //large
                    $dpath = public_path().'/uploads/Projects/large/'.$ImageName;
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($Spath);
                    $image->scaleDown(1400);
                    $image->save($dpath);



                    //small
                    $dpath = public_path().'/uploads/Projects/small/'.$ImageName;
                    $image->cover(300,300);
                    $image->save($dpath);
                    return response()->json([
                        'status' => true,
                        'Image_id' => $projectImage->id, 
                        'Image_path' => asset('uploads/Projects/small/'.$projectImage->image) ,
                        'msg' => 'Image Added Successfully'
                    ]);
        


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $project = Project::find($id);

        if(empty($project)){
            $request->session()->flash('error','Project Not Found');

            return redirect()->route("Designer.project");
        }
        $validator = Validator::make($request->all(),[
            'title' => [ 'required','min:3', new Alpha],
            'slug' => 'required|unique:projects,slug,'.$project->id.',id',
            'type' => [ 'required','min:3', new Alpha],
            'short_description' => 'required|min:10',
            'description' => 'required|min:10',
            'status' => 'required',
    
           ]);

           if($validator->passes()){

            $user = Auth::user();
             

          
            $project->designer_id = $user->id;
            $project->title = $request->title;
            $project->slug = $request->slug;
            $project->project_type = $request->type;
            $project->short_description = $request->short_description;
            $project->description = $request->description;
            $project->status = $request->status;
            $project->update();


              
            

            $request->session()->flash('success','Project Upadted Successfully');

            return response()->json([
                'status' => true,
                'msg' =>'Project Updated Successfully',
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
        
        $project = Project::find($id);
        if(empty($project)){
        $request->session()->flash('error','Project Not Found');
            return response()->json([
            'status' => false,
            'NotFound' => true,
            ]);
        }

        $projectImages = ProductImage::where('project_id',$id)->get();

        if(!empty($projectImages)){
            foreach($projectImages as $projectImage){
               File::delete(public_path('uploads/Projects/large/'.$projectImage->image));
               File::delete(public_path('uploads/Projects/small/'.$projectImage->image));
            }
           ProjectImage::where('project',$id)->delete();
        }
        $project->delete();
        $request->session()->flash('success','Gallery will be Deleted Successfully');
        return response()->json([
            'status' => true,
            'msg' => 'Gallery will be Deleted Successfully',
            ]);
    }

}