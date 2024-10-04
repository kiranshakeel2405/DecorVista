@extends('Designer.master')
@section('content')

<main id="main" class="main">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Consultations</h5>

            <!-- Availability Setup -->
            <h2 class="h4 mb-3">Availability Setup</h2>
            <form action="{{ route('consultations.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <h5>Available Days</h5>
                    <div class="d-flex flex-wrap">
                        @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                        <div class="form-check me-3"
                            style="position: relative; padding: 10px; border: 1px solid #ddd; border-radius: 5px; transition: background-color 0.3s;">
                            <input class="form-check-input" type="checkbox" id="{{ strtolower($day) }}"
                                name="available_days[]" value="{{ $day }}">
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
                        <div class="row mb-2">
                            <div class="col-md-5">
                                <input type="time" class="form-control" name="available_time_slots[0][]" required>
                            </div>
                            <div class="col-md-5">
                                <input type="time" class="form-control" name="available_time_slots[0][]" required>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger remove-time-slot">Remove</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="addTimeSlot" class="btn btn-primary">Add Another Time Slot</button>
                </div>

                <div class="text-start">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('Designer.project') }}" class="btn btn-secondary">Back</a>
                </div>
            </form><!-- End form -->

        </div>
    </div>

</main><!-- End #main -->

@section('js')
    document.addEventListener('DOMContentLoaded', function() {
        let timeSlotCount = 1; // Keep track of the time slot groups

        document.getElementById('addTimeSlot').addEventListener('click', function() {
            const timeSlotHtml = `
                <div class="row mb-2">
                    <div class="col-md-5">
                        <input type="time" class="form-control" name="available_time_slots[${timeSlotCount}][]" required>
                    </div>
                    <div class="col-md-5">
                        <input type="time" class="form-control" name="available_time_slots[${timeSlotCount}][]" required>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-time-slot">Remove</button>
                    </div>
                </div>`;
            
            document.getElementById('timeSlotContainer').insertAdjacentHTML('beforeend', timeSlotHtml);
            timeSlotCount++; // Increment the counter for the next group
        });

        document.getElementById('timeSlotContainer').addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-time-slot')) {
                event.target.closest('.row').remove();
            }
        });
    });
@endsection

@endsection