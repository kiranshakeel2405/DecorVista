@extends('Designer.master')
@section('content')

<main id="main" class="main">

    @include('Message.message')

    <div class="pagetitle">
        <h1>My Portfolios</h1>
        
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('designer.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Portfolios</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="p-3 d-flex justify-content-end">
                    <a href="{{ route('Designer.Portfolio.edit', $designer->id) }}" class="btn btn-primary">Edit Portfolio</a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><b>ID</b></th>
                                    <th><b>Image</b></th>
                                    <th><b>Name</b></th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td>{{ $designer->id }}</td>
                                    <td>
                                        @if(!empty($portfolio))
                                            <img src="{{ asset('uploads/Designer/small/'.$portfolio->image) }}" alt="" width="50px" class="rounded">
                                        
                                        @endif
                                    </td>
                                   
                                    <td>{{ $designer->name }}</td>
                                    <td>{{ $designer->email }}</td>
                                    <td>{{ $designer->contact }}</td>
                                   
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection

@section('js')
function deletePortfolio(id) {
    var url = '{{ route("portfolio.delete", "ID") }}';
    var newurl = url.replace('ID', id);
    if (confirm('Are you sure you want to delete this portfolio?')) {
        $.ajax({
            url: newurl,
            type: 'DELETE',
            data: {},
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    window.location.reload(); // Reload the page to reflect changes
                } else {
                    alert('Error deleting portfolio');
                }
            }
        });
    }
}
@endsection
