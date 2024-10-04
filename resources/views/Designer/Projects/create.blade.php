@extends('Designer.master')
@section('content')


<main id="main" class="main">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Project</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" id="ProjectForm" name="ProjectForm" action="" method="post">
                @csrf

               

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Product Name">
                        <span></span>
                        <label for="title">Project Title</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="slug" name="slug" readonly placeholder="Slug">
                        <span></span>
                        <label for="slug">Slug</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="type" name="type" placeholder="Product Name">
                        <span></span>
                        <label for="type">Project Type</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Block</option>
                    </select>
                    <span></span>
                </div>
                <div class="col-md-6">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea name="short_description" id="short_description" cols="30" rows="5" class="form-control"></textarea>
                    <span></span>
                </div>
                <div class="col-md-6">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                    <span></span>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body pt-4">
                            <h2 class="h4 mb-3">Media</h2>
                            <div id="image" class="dropzone dz-clickable p-4">
                                <div class="dz-message needsclick">
                                    <br>Drop files here or click to upload.<br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="tempimage">

                </div>
              
                
            
                

                

                <div class="text-start">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('Designer.project') }}" class="btn btn-secondary">Back</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>

</main><!-- End #main -->


@endsection

@section('js')

$(document).ready(function() {


    $('#ProjectForm').submit(function(event) {
    $('button[type=submit]').prop('disabled', true)
    
    event.preventDefault();
    var element = $(this)
    
    $.ajax({
    url:'{{ route("Designer.project.store") }}',
    type:'post',
    data: element.serializeArray(),
    dataType:'json',
    success:function(response){
        $('button[type=submit]').prop('disabled', false)

        if(response.ImageLimit == false){
            alert(response.error)
        }
    
    if(response.status == true){
        window.location.href = "{{ route('Designer.project') }}"
    
    $('#title').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
    .html('')
    $('#slug').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
    .html('')
    $('#type').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
    .html('')
    $('#short_description').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
    .html('')
    $('#description').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
    .html('')
    
    
    
    
    }
    else{
    var error = response['errors']
    if (error['title']) {
    $('#title').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
    .html(error['title'])
    } else {
    $('#title').removeClass('is-invalid').siblings('span').removeClass(
    'invalid-feedback').html('')
    }

    if (error['slug']) {
    $('#slug').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
    .html(error['slug'])
    } else {
    $('#slug').removeClass('is-invalid').siblings('span').removeClass(
    'invalid-feedback').html('')
    }

    if (error['type']) {
        $('#type').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
        .html(error['type'])
        } else {
        $('#type').removeClass('is-invalid').siblings('span').removeClass(
        'invalid-feedback').html('')
        }

        if (error['short_description']) {
            $('#short_description').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
            .html(error['short_description'])
            } else {
            $('#short_description').removeClass('is-invalid').siblings('span').removeClass(
            'invalid-feedback').html('')
            }

            if (error['description']) {
                $('#description').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
                .html(error['description'])
                } else {
                $('#description').removeClass('is-invalid').siblings('span').removeClass(
                'invalid-feedback').html('')
                }
    
   
    }
    
    },
    })
    });
    });


    $('#title').change(function() {
    var element = $(this).val();
    $('button[type=submit]').prop('disabled', true)
    $.ajax({
    url: '{{route("GetSlug")}}',
    type: 'get',
    data: {
    title: element
    },
    dataType: 'json',
    success: function(respose) {
    $('button[type=submit]').prop('disabled', false)
    $('#slug').val(respose['slug']);
    }
    })
    })



    
Dropzone.autoDiscover = false;
const dropzone = $("#image").dropzone({
    init: function() {
        this.on('addedfile', function(file) {
            $('button[type=submit]').prop('disabled', true)
            if (this.files.length > 4) {
                this.removeFile(file); // Remove the newly added file
                alert('You can only upload a maximum of 4 images.');
            }
        });
    },
    url: "{{ route('Temp-image') }}",
    maxFiles: 4, // Maximum files to allow
    paramName: 'image',
    addRemoveLinks: true,
    acceptedFiles: "image/jpeg,image/png,image/gif,image/webp",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(file, response) {
$('button[type=submit]').prop('disabled', false)
        console.log(file);
        var html = `<div class="col-md-3" id="row-image-${response.Image_id}">
            <div class="card">
                <input type="hidden" name="img_array[]" value="${response.Image_id}">
                <img src="${response.Image_path}" class="card-img-top" alt="..." width="100px">
                <div class="card-body p-4">
                    <a href="javascript:void(0)" onclick="deleteTempImg(${response.Image_id})" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>`;

        $('#tempimage').append(html);
    },
    complete: function(file) {
        // Remove the file from Dropzone after upload
        this.removeFile(file);
    }
});



function deleteTempImg(id) {
$('#row-image-' + id).remove();

}
@endsection