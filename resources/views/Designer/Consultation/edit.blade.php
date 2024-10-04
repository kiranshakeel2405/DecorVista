@extends('Designer.master')
@section('content')

<main id="main" class="main">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Consultations</h5>

            <h2 class="h4 mb-3">Availability Setup</h2>
            <form action="{{ route('consultations.update', $consultation->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <h5>Available Days</h5>
                    <div class="d-flex flex-wrap">
                        @php
                        $availableDays = explode(', ', $consultation->days);
                        @endphp
                        @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                        <div class="form-check me-3"
                            style="position: relative; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                            <input class="form-check-input" type="checkbox" id="{{ strtolower($day) }}"
                                name="available_days[]" value="{{ $day }}"
                                {{ in_array($day, $availableDays) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ strtolower($day) }}"
                                style="cursor: pointer; padding-left: 30px;">
                                {{ $day }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-4">
                    <h5>Available Time Slots</h5>
                    <div class="time-slot" id="timeSlotContainer">
                        @php
                        // Decode the JSON string into an array of arrays
                        $availableTimeSlots = json_decode($consultation->time, true) ?? [];
                        @endphp

                        @foreach ($availableTimeSlots as $time)
                        <div class="row mb-2 time-slot-row">
                            <div class="col-md-5">
                                <input type="time" class="form-control" name="available_time_slots[][0]"
                                    value="{{ $time[0] }}" required>
                            </div>
                            <div class="col-md-5">
                                <input type="time" class="form-control" name="available_time_slots[][1]"
                                    value="{{ $time[1] }}" required>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger remove-time-slot">Remove</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-start">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('Designer.project') }}" class="btn btn-secondary">Back</a>
                </div>
            </form><!-- End form -->

        </div>
    </div>

</main><!-- End #main -->

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const timeSlotContainer = document.getElementById('timeSlotContainer');

    // Event delegation to handle removal of time slots
    timeSlotContainer.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-time-slot')) {
            event.target.closest('.time-slot-row').remove();
        }
    });
});
</script>

@endsection