@extends('Designer.master')
@section('content')

<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Your Portfolio</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" id="PortfolioForm" name="PortfolioForm" action="" method="post">
                @csrf
                <input type="hidden" id="portfolio_id" name="portfolio_id" value="{{ $portfolio->id }}">

                <div id="portfolioItems">
                    <!-- Initial Project Item -->
                    <div class="row portfolio-item mb-4">
                        
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="shortbiography" id="shortbiography" 
                                placeholder="Add Short Biography" value="{{ $portfolio->short_bio }}">
                                <span></span>
                                <label for="biography">Short Biography</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="detailedbiography" id="detailedbiography" 
                                placeholder="Add your Detailed Biography" value="{{ $portfolio->long_bio }}">
                                <span></span>
                                <label for="detailedbiography">Detailed Biography With Professional Experience</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <input type="hidden" id="image" name="image" value="{{ $portfolio->image }}">
                            <div class="card mb-3">
                                <div class="card-body pt-4">
                                    <h2 class="h4 mb-3">Your profile Image</h2>
                                    <div id="image-box" class="dropzone dz-clickable p-4">
                                        <div class="dz-message needsclick">
                                            @if($portfolio->image)
                                                <img src="{{ asset('uploads/Designer/large/'.$portfolio->image) }}" alt="Profile Image" width="150">
                                                <br><br>
                                                Change image? Drop new files here or click to upload.<br><br>
                                            @else
                                                Drop files here or click to upload.<br><br>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <br>

                <div class="text-start">
                    <button type="submit" class="btn btn-primary">Update Portfolio</button>
                    <a href="{{ route('portfolio.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form><!-- End floating Labels Form -->
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#PortfolioForm').submit(function(event) {
            $('button[type=submit]').prop('disabled', true);
            event.preventDefault();
            var element = $(this);
            // alert("shjjasgjf")
            $.ajax({
                url: '{{ route("portfolio.update", $portfolio->id) }}', // Update route
                type: 'POST',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {
                    $('button[type=submit]').prop('disabled', false);
    
                    if(response.status == true){
                        window.location.href = "{{ route('portfolio.index') }}";
    
                        // Reset validation errors
                        $('#shortbiography').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback').html('');
                        $('#detailedbiography').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback').html('');
                    } else {
                        var error = response.errors;
    
                        if (error.shortbiography) {
                            $('#shortbiography').addClass('is-invalid').siblings('span').addClass('invalid-feedback').html(error.shortbiography);
                        } else {
                            $('#shortbiography').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback').html('');
                        }
    
                        if (error.detailedbiography) {
                            $('#detailedbiography').addClass('is-invalid').siblings('span').addClass('invalid-feedback').html(error.detailedbiography);
                        } else {
                            $('#detailedbiography').removeClass('is-invalid').siblings('span').removeClass('invalid-feedback').html('');
                        }
    
                        if(error.image){
                            alert(error.image);
                        }
                    }
                }
            });
        });
    
        // Dropzone setup
        Dropzone.autoDiscover = false;
        const dropzone = $("#image-box").dropzone({
            init: function() {
                this.on('addedfile', function(file) {
                    $('button[type=submit]').prop('disabled', true);
    
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }
                });
            },
            url: "{{ route('Temp-image') }}", // Temp image route
            maxFiles: 1,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif,image/webp",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, response) {
                $('button[type=submit]').prop('disabled', false);
                alert(response.Image_id);
                $("#image").val(response.Image_id);
            },
        });
    });
    </script>
</main><!-- End #main -->

@endsection


