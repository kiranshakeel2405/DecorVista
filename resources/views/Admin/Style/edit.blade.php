@extends('Admin.master')
@section('content')


<main id="main" class="main">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Style</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" id="StyleForm" name="StyleForm" action="" method="post">
                @csrf

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $style->name }}">
                        <span></span>
                        <label for="name">Name</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="slug" name="slug" readonly placeholder="Slug" value="{{ $style->name }}">
                        <span></span>
                        <label for="slug">Slug</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-select">
                        <option value="1" {{ ($style->status == 1) ? 'selected' : '' }}>Active</option>
                        <option value="0"  {{ ($style->status == 0) ? 'selected' : '' }}>Block</option>
                    </select>
                    <span></span>
                </div>

                <div class="text-start">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('Admin.style') }}" class="btn btn-secondary">Back</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>

</main><!-- End #main -->


@endsection
@section('js')
$(document).ready(function() {


$('#StyleForm').submit(function(event) {
$('button[type=submit]').prop('disabled', true)

event.preventDefault();
var element = $(this)

$.ajax({
url:'{{ route("Admin.style.update",$style->id) }}',
type:'post',
data: element.serializeArray(),
dataType:'json',
success:function(response){
    $('button[type=submit]').prop('disabled', false)

if(response.status == true){
    window.location.href = "{{ route('Admin.style') }}"

$('#name').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#slug').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
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
@endsection