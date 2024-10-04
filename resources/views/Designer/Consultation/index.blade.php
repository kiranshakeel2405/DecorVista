@extends('Designer.master')

@section('content')

<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Consultations List</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Available Days</th>
                        <th>Available Time Slots</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($consultations as $consultation)
                <tr>
                    <td>{{ $consultation->id }}</td>
                    <td>{{ $consultation->days }}</td>
                    <td>
                        @php
                            $timeSlots = json_decode($consultation->time);
                        @endphp
                        @if (is_array($timeSlots))
                            @foreach ($timeSlots as $index => $slot)
                                @if (is_array($slot)) <!-- Check if $slot is an array -->
                                    <strong>Slot {{ $index + 1 }}:</strong> {{ implode(', ', $slot) }}<br>
                                @else
                                    <!-- Handle unexpected structure (optional) -->
                                    <strong>Slot {{ $index + 1 }}:</strong> {{ $slot }}<br>
                                @endif
                            @endforeach
                        @else
                            {{ $timeSlots }}
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('consultations.edit', $consultation->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('consultations.destroy', $consultation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach




                </tbody>
            </table>
        </div>
    </div>
</main>

@endsection