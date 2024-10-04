@extends('Admin.master')
@section('content')


<main id="main" class="main">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit User</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" id="UserForm" name="UserForm" action="{{ route('admin.users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Name" required>
                        <span></span>
                        <label for="name">Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{ $user->email }}" required>
                        <span></span>
                        <label for="email">email</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="numeric" class="form-control" id="contact" name="contact" placeholder="Contact" value="{{ $user->contact }}" required>
                        <span></span>
                        <label for="contact">Contact</label>
                    </div>
                </div>
                

            

            

                <div class="text-start">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>

</main><!-- End #main -->


@endsection

@section('js')
$(document).ready(function() {


$('#UserForm').submit(function(event) {
$('button[type=submit]').prop('disabled', true)

event.preventDefault();
var element = $(this)

$.ajax({
url:'{{ route("admin.users.update",$user->id) }}',
type:'put',
data: element.serializeArray(),
dataType:'json',
success:function(response){
    $('button[type=submit]').prop('disabled', false)

if(response.status == true){
    window.location.href = "{{ route('admin.users.index') }}"

$('#name').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#email').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#contact').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')


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
if (error['email']) {
$('#email').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['email'])
} else {
$('#email').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
if (error['contact']) {
$('#contact').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['contact'])
} else {
$('#contact').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
if (error['password']) {
$('#password').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['password'])
} else {
$('#password').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}

}


},
})
});
});


@endsection