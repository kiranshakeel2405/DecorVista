<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use App\Rules\Alpha;
use App\Models\TempImage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'name' => [ 'required','min:3', new Alpha],
            'email' => 'required|email|unique:users,email,' . $user->id . ',id',
            'phone' => 'required|numeric|digits:11',
        ]);

        if($validator->passes()){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->contact = $request->phone;
            $user->update();

            if($request->image_id != ""){
                $tempimginfo = TempImage::find($request->image_id);
                $extArray = explode('.',$tempimginfo->image);
                $ext = last($extArray);
               
    
    
                $ImageName = $user->id.'-'.'-'.time().'.'.$ext;
                $user->image = $ImageName;
                $user->save();;
    
    
    
                // Generate thumbnail
    
                //large
                       $Spath = public_path().'/temp/'.$tempimginfo->image;
                     
                        $dpath = public_path().'/uploads/profile/large/'.$ImageName;
                        $manager = new ImageManager(new Driver());
                        $image = $manager->read($Spath);
                        $image->scaleDown(1400);
                        $image->save($dpath);
                        
    
    
    
                        //small
                        $dpath = public_path().'/uploads/profile/small/'.$ImageName;
                        $image->cover(400,400);
                        $image->save($dpath);
            }


            return response()->json([
                'status' => true,
                'msg' =>'Profile Updated SuccessFully',
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
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('Front.index');
    }
}
