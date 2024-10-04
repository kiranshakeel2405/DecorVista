@extends('Admin.master')
@section('content')


<main id="main" class="main">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add User</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" id="UserForm" name="UserForm" action="" method="post">
                @csrf

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        <span></span>
                        <label for="name">Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="email" >
                        <span></span>
                        <label for="email">email</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="numeric" class="form-control" id="contact" name="contact" placeholder="Contact" >
                        <span></span>
                        <label for="contact">Contact</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                        <span></span>
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder=" Confirm Password" >
                        <span></span>
                        <label for="password_confirmation">Confirm Password</label>
                    </div>
                </div>

            

            

                <div class="text-start">
                    <button type="submit" class="btn btn-primary">Create</button>
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
url:'{{ route("admin.users.store") }}',
type:'post',
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
.html('')
$('#password').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#password_confirmation').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
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
if (error['password_confirmation']) {
$('#password_confirmation').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['password_confirmation'])
} else {
$('#password_confirmation').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
}


},
})
});
});


@endsection