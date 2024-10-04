<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Booking;
use App\Models\Project;
use App\Models\Portfolio;
use App\Models\Consultation;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request , $id)
    {

        $designer = User::find($id);
        $projects = Project::where('designer_id',$designer->id)->latest()->with('images')->get();
        $portfolios = Portfolio::where('user_id', $designer->id)->firstorfail();
        // dd($portfolios->long_bio);die();
        return view('designers.designer-detail-1',compact('designer','projects','portfolios'));
    }
    
    public function ProjectDetail($id){
        $projects = Project::where('id',$id)->latest()->with('images')->firstorfail();
        return view('projects-details',compact('projects'));
    }

    public function ProjectDetailsAjax($id){
        $projects = Project::where('id', $id)->latest()->with('images')->firstOrFail();
        
        // Optional: Check if data is actually retrieved
        if ($projects) {
            return response()->json($projects);
        } else {
            return response()->json(['error' => 'Project not found'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request , $id)
    {
        if (Auth::check() == false) {
           

            if(!session()->has('url.intended')){
                session(['url.intended' => url()->current()]);
            }

            return redirect()->route('login');
        }

        $user = Auth::user();
        $user_id =$id;

        $consaltations = Consultation::where('user_id',$id)->get();
        session()->forget('url.intended');


        return view('booking',compact('user','consaltations','user_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          
            'day' => 'required',
            'time' => 'required',
            'address' => 'required',
        ]);


        if($validator->passes()){

            $user = Auth::user();

            $booking = new Booking();
            $booking->consaltation_id = $request->time;
            $booking->user_id = $user->id;
            $booking->address = $request->address;
            $booking->save();


            
        $request->session()->flash('success','Booking Added Successfully');

        return response()->json([
            'status' => true,
            'msg' =>'Booking Added Successfully',
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
    public function show(Request $request)
    {

        

        $timeSlots = Consultation::where(['days' => $request->days , 'user_id' => $request->id ])->first();

        return response()->json([
            'status' => true,

            'timeSlots' => $timeSlots,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}