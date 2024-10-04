@extends('Designer.master')
@section('content')

<main id="main" class="main">

    @include('Message.message')

    <div class="pagetitle">
        <h1>My Projects</h1>
        
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('designer.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Projects</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="p-3 d-flex justify-content-end">
                    <a href="{{ route('Designer.project.create') }}" class="btn btn-primary">Create Project</a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><b>ID</b></th>
                                    <th><b>Image</b></th>
                                    <th><b>Project Name</b></th>
                                    <th>Project Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($projects))

                                @foreach($projects as $project)
                                @php
                                $img = $project->images->first()
                                
                                @endphp
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>
                                        @if(!empty($img->image))

                                        <img src="{{ asset('uploads/Projects/small/' . $img->image) }}" class="rounded"
                                            width="50px" alt="">

                                        @else

                                        <img src="{{ asset('Asset/Admin/img/default.png') }}" class="rounded"
                                            width="50px" alt="">
                                        @endif

                                    </td>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->project_type }}</td>
                                    <td>
                                        @if($project->status == 1)
                                        <svg class="text-success-500 h-6 w-6 text-success" width="30px"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        @else
                                        <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="30px"
                                            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                        @endif
                                    </td>
                                  
                                    <td>
                                        <a href="{{  route('Designer.project.edit',$project->id) }}" class="btn btn-success">Edit</a>
                                        <a href="javascript:void(0)" class="btn btn-danger" onclick="deleteProject('{{$project->id}}')">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7" class="text-center">No portfolios found</td>
                                </tr>
                                @endif
                                
                             
                               
                              
                                
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
function deleteProject(id) {
    var url = '{{route("Designer.project.delete","ID")}}';
    var newurl = url.replace('ID', id)
    if (confirm('Are You sure want to delete')) {
        $.ajax({
            url: newurl,
            type: 'delete',
            data: {},
            dataType: 'json',
            success: function(response) {
                if (response['status']) {
                    window.location.href = '{{route("Designer.project")}}'

                }
                else{
                    window.location.href = '{{route("Designer.project")}}'

                }
            }
        })
    }


}
@endsection