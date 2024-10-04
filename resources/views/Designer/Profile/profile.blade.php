@extends('Designer.master')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @if (!empty(Auth::user()->image))
                        <img src="{{ asset('uploads/profile/small/'. Auth::user()->image) }}" alt="Profile"
                            class="rounded-circle">
                        @else
                        <img src="{{ asset('Asset/Admin/img/profile-img.jpg') }}" alt="Profile"
                            class="img-fluid Profile-img rounded">
                        @endif
                       
                        <h2>{{ Auth::user()->name }}</h2>
                        <h3>Admin</h3>

                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-settings">Settings</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">


                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                                </div>




                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->contact }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                                </div>

                            </div>

                            <section class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form method="post" action="" id="ProfileForm" name="ProfileForm">
                                    @csrf
                                    @method('patch')

                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="hidden" name="image_id" id="image_id">
                                            @if (!empty(Auth::user()->image))
                                            <img src="{{ asset('uploads/profile/small/'. Auth::user()->image) }}"
                                                alt="Profile" class="img-fluid Profile-img rounded">
                                            @else
                                            <img src="{{ asset('Asset/Admin/img/profile-img.jpg') }}" alt="Profile"
                                                class="img-fluid Profile-img rounded">
                                            @endif

                                            <div class="pt-2">
                                                <a href="#" class="btn btn-primary btn-sm upload-img-button"
                                                    title="Upload new profile image">
                                                    <i class="bi bi-upload upload-img-button"></i>
                                                </a>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name"
                                                value="{{ old('name', Auth::user()->name) }}" required autofocus>
                                            <span></span>
                                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="phone"
                                                value="{{ old('phone', Auth::user()->contact) }}">
                                            <span></span>
                                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="email"
                                                value="{{ old('email', Auth::user()->email) }}" required>
                                            <span></span>
                                            <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&
                                            !$user->hasVerifiedEmail())
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-800">
                                                    {{ __('Your email address is unverified.') }}
                                                    <button form="send-verification"
                                                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        {{ __('Click here to re-send the verification email.') }}
                                                    </button>
                                                </p>
                                                @if (session('status') === 'verification-link-sent')
                                                <p class="mt-2 font-medium text-sm text-green-600">
                                                    {{ __('A new verification link has been sent to your email address.') }}
                                                </p>
                                                @endif
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>

                                        <p class="mt-2 font-medium text-sm text-green-600 success-msg">

                                        </p>

                                    </div>
                                </form>
                                <!-- End Profile Edit Form -->
                            </section>


                            <div class="tab-pane fade pt-3" id="profile-settings">

                                <!-- Settings Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Delete
                                            Account</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="form-check">
                                                <label class="form-check-label" for="changesMade">
                                                    Once your account is deleted, all of its resources and data will be
                                                    permanently deleted. Before deleting your account, please download
                                                    any data or information that you wish to retain.
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#basicModal">Delete Account</button>
                                    </div>
                                </form><!-- End settings Form -->
                                <!-- Delete Modal-->
                                <div class="modal fade" id="basicModal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Account</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Once your account is deleted, all of its resources and data will be
                                                permanently deleted. Before deleting your account, please download
                                                any data or information that you wish to retain.

                                                <form action="{{ route('profile.destroy') }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <input type="password" name="password" id="password"
                                                        placeholder="Password" class="form-control my-5">
                                                    <x-input-error :messages="$errors->userDeletion->get('password')"
                                                        class="mt-2" />

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete Account</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- End Delete Modal-->


                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                    @csrf
                                    @method('put')

                                    <div class="row mb-3">
                                        <label for="update_password_current_password"
                                            class="col-md-4 col-lg-3 col-form-label">{{ __('Current Password') }}</label>
                                        <div class="col-md-8 col-lg-9">
                                            <x-text-input id="update_password_current_password" name="current_password"
                                                type="password" class="form-control" autocomplete="current-password" />
                                            <x-input-error :messages="$errors->updatePassword->get('current_password')"
                                                class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="update_password_password"
                                            class="col-md-4 col-lg-3 col-form-label">{{ __('New Password') }}</label>
                                        <div class="col-md-8 col-lg-9">
                                            <x-text-input id="update_password_password" name="password" type="password"
                                                class="form-control" autocomplete="new-password" />
                                            <x-input-error :messages="$errors->updatePassword->get('password')"
                                                class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="update_password_password_confirmation"
                                            class="col-md-4 col-lg-3 col-form-label">{{ __('Confirm Password') }}</label>
                                        <div class="col-md-8 col-lg-9">
                                            <x-text-input id="update_password_password_confirmation"
                                                name="password_confirmation" type="password" class="form-control"
                                                autocomplete="new-password" />
                                            <x-input-error
                                                :messages="$errors->updatePassword->get('password_confirmation')"
                                                class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>


                                        @if (session('status') === 'password-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition
                                            x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                                            {{ __('Saved.') }}</p>
                                        @endif
                                    </div>
                                </form>
                                <!-- End Change Password Form -->


                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@endsection

@section('js')
$(document).ready(function() {


$('#ProfileForm').submit(function(event) {
$('button[type=submit]').prop('disabled', true)

event.preventDefault();
var element = $(this)

$.ajax({
url:'{{ route("profile.update") }}',
type:'patch',
data: element.serializeArray(),
dataType:'json',
success:function(response){
$('button[type=submit]').prop('disabled', false)

if(response.status == true){

$('.success-msg').html(response.msg)

$('#name').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#email').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
.html('')
$('#phone').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback')
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
if (error['phone']) {
$('#phone').addClass('is-invalid').siblings('span').addClass('invalid-feedback')
.html(error['phone'])
} else {
$('#phone').removeClass('is-invalid').siblings('span').removeClass(
'invalid-feedback').html('')
}
}

},
})
});
});

Dropzone.autoDiscover = false;

const dropzone = $(".upload-img-button").dropzone({
init: function() {
this.on('addedfile', function(file) {
$('button[type=submit]').prop('disabled', true);

if (this.files.length > 1) {
this.removeFile(this.files[0]);
}
});
},
url: "{{ route('Temp-image') }}",
maxFiles: 4,
paramName: 'image',
addRemoveLinks: false,
acceptedFiles: "image/jpeg,image/png,image/gif,image/webp",
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
success: function(file, response) {
$('button[type=submit]').prop('disabled', false);

$("#image_id").val(response.Image_id);
$(".Profile-img").attr('src',response.Image_path);

},
previewTemplate: '<div></div>',
});


$('form').on('reset', function() {
dropzone.removeAllFiles(true);
});

@endsection