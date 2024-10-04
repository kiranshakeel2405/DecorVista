@extends('Admin.master')
@section('content')


<main id="main" class="main">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Product</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" id="ProductForm" name="ProductForm" action="" method="post">
                @csrf



                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
                        <span></span>
                        <label for="name">Product Name</label>
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
                    <label for="category_id" class="form-label">Category</label>
                    <select id="category_id" name="category_id" class="form-select" onchange="fetchSubcategories()">
                        <option value="">Select a Category</option>
                        @if (!empty($categories))
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        @endif
                    </select>
                    <span></span>
                </div>

                <div class="col-md-6">
                    <label for="subcategory_id" class="form-label">Sub Category</label>
                    <select id="subcategory_id" name="subcategory_id" class="form-select">
                        <option value="">Select a Sub Category</option>
                    </select>
                    <span></span>
                </div>

                <div class="col-md-6">
                    <label for="brand_id" class="form-label">Brand</label>
                    <select id="brand_id" name="brand_id" class="form-select">
                        <option value="">Select a Brand</option>
                        @if (!empty($brands))
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{$brand->name}}</option>

                        @endforeach

                        @endif
                    </select>
                    <span></span>
                </div>
                <div class="col-md-6">
                    <label for="style_id" class="form-label">Style</label>
                    <select id="style_id" name="style_id" class="form-select">
                        <option value="">Select a Style</option>
                        @if (!empty($styles))
                        @foreach ($styles as $style)
                        <option value="{{ $style->id }}">{{$style->name}}</option>

                        @endforeach

                        @endif
                    </select>
                    <span></span>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="heigth" name="heigth"
                            placeholder="Height (in inches)">
                        <span></span>
                        <label for="height">Height (in inches)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="width" name="width"
                            placeholder="Width (in inches)">
                        <span></span>
                        <label for="width">Width (in inches)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="depth" name="depth"
                            placeholder="Depth (in inches)">
                        <span></span>
                        <label for="depth">Depth (in inches)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="material" name="material" placeholder="Material">
                        <span></span>

                        <label for="name">Material</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="numeric" class="form-control" id="price" name="price" placeholder="Price">
                        <span></span>
                        <label for="name">Price</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="numeric" class="form-control" id="qty" name="qty" placeholder="Quantity"
                            value="">
                        <span></span>
                        <label for="name">Quantity</label>
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
               
                <div class="col-md-8">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control">
                    </textarea>
                    <span></span>
                </div>
                <div class="col-md-8">
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
                    <a href="{{ route('Admin.product') }}" class="btn btn-secondary">Back</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>

</main><!-- End #main -->


@endsection

@section('js')
$(document).ready(function() {


$('#ProductForm').submit(function(event) {
$('button[type=submit]').prop('disabled', true)

event.preventDefault();
var element = $(this)

$.ajax({
url:'{{ route("Admin.product.store") }}',
type:'post',
data: element.serializeArray(),
dataType:'json',
success:function(response){
$('button[type=submit]').prop('disabled', false)
if(response.ImageLimit == false){
alert(response.error)
}

if(response.status == true){
window.location.href = "{{ route('Admin.product') }}"

$('#name').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#slug').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')

$('#category_id').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#sub_category_id').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#brand_id').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#style_id').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#heigth').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#width').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#depth').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#material').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#price').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#qty').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#description').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')

}
else{
var error = response['errors']
if (error['name']) {
$('#name').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['name'])
} else {
$('#name').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
if (error['slug']) {
$('#slug').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['slug'])
} else {
$('#slug').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
if (error['category_id']) {
$('#category_id').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['category_id'])
} else {
$('#category_id').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
if (error['qty']) {
$('#qty').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['qty'])
} else {
$('#qty').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
if (error['description']) {
$('#description').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['description'])
} else {
$('#description').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
if (error['subcategory_id']) {
$('#subcategory_id').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['subcategory_id'])
} else {
$('#subcategory_id').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
if (error['brand_id']) {
$('#brand_id').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['brand_id'])
} else {
$('#brand_id').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
if (error['style_id']) {
$('#style_id').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['style_id'])
} else {
$('#style_id').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
if (error['heigth']) {
$('#heigth').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['heigth'])
} else {
$('#heigth').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
if (error['width']) {
$('#width').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['width'])
} else {
$('#width').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
if (error['depth']) {
$('#depth').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['depth'])
} else {
$('#depth').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
if (error['material']) {
$('#material').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['material'])
} else {
$('#material').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
if (error['price']) {
$('#price').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['price'])
} else {
$('#price').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
}

},
})
});
});

$('#name').change(function() {
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


$(document).ready(function() {
// Fetch subcategories based on selected category
window.fetchSubcategories = function() {
var categoryId = $('#category_id').val();
$('#subcategory_id').empty().append('<option value="">Select a Sub Category</option>');

if (categoryId) {
$.ajax({
url: '{{ route("getSubcategories") }}', // Your route to get subcategories
type: 'GET',
data: { category_id: categoryId },
dataType: 'json',
success: function(response) {
if (response.status) {
response.subcategories.forEach(function(subcategory) {
$('#subcategory_id').append(new Option(subcategory.name, subcategory.id));
});
}
},
error: function() {
alert('Error fetching subcategories');
}
});
}
};
});

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