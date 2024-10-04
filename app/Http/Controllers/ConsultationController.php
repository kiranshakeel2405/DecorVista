<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::all(); 
       
        return view('Designer.consultation.index', compact('consultations')); 
    }
    public function create()
    {
        return view('Designer.consultation.create');
    }

   public function store(Request $request)
   {
        $validatedData = $request->validate([
            'available_days' => 'required|array',
            'available_days.*' => 'string',
            'available_time_slots' => 'required|array',
            'available_time_slots.*' => 'required|array', // Allowing multidimensional array
            'available_time_slots.*.*' => 'date_format:H:i', // Validate the inner time slots
        ]);

       $consultation = new Consultation();
       $consultation->user_id = auth()->id(); 
       $consultation->days = implode(', ', $validatedData['available_days']);
       $consultation->time = json_encode($validatedData['available_time_slots']); 
       $consultation->save();

       return redirect()->route('consultations.create')->with('success', 'Consultation created successfully!');
   }


   public function edit(Request $request, $id){

    $consultation = Consultation::find($id);

    if(empty($consultation)){

        $request->session()->flash('error','Cunsaltion Not Found');

        return redirect()->route("consultations.index");
    }


    return view('Designer.Consultation.edit',compact('consultation'));
   }

   public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'available_days' => 'required|array',
        'available_days.*' => 'string',
        'available_time_slots' => 'required|array',
        'available_time_slots.*.0' => 'required|date_format:H:i', // Ensure start time is required
        'available_time_slots.*.1' => 'required|date_format:H:i', // Ensure end time is required
    ]);

    // Fetch the existing consultation record
    $consultation = Consultation::findOrFail($id);
    $consultation->user_id = auth()->id();
    $consultation->days = implode(', ', $validatedData['available_days']);
    
    // Format the time slots for storage
    $timeSlots = [];
    foreach ($validatedData['available_time_slots'] as $slot) {
        // Ensure that both start and end are present in the multidimensional array
        $timeSlots[] = [$slot[0], $slot[1]];
    }
    
    // Store the time slots as JSON
    $consultation->time = json_encode($timeSlots); 
    $consultation->save();

    return redirect()->route('consultations.index')->with('success', 'Consultation updated successfully!');
}

   

public function destroy($id)
{
    $consultation = Consultation::findOrFail($id);
    $consultation->delete();

    return redirect()->route('consultations.index')->with('success', 'Consultation deleted successfully!');
}


}
