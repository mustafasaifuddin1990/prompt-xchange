@extends('backend/partials/header')
@section('content')
    <section class="dashboard_secs acc_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="head_title d-flex">
                        <img src="{{asset('backend/assets/img/square.png')}}" alt="">
                        <h3>Profile Update</h3>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="black_sec">
                        <div class="head_title">
                            <div class="pricing_form">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="name">Name:</label><br>
                                        <input type="text" id="name" name="customer_name" placeholder="Enter the name"
                                               required value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="email">Email:</label><br>
                                        <input type="email" id="email" name="email" placeholder="Enter the email" required value="{{ Auth::user()->email }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="phone">Phone:</label><br>
                                        <input type="text" id="phone" name="user_phone" placeholder="Enter the phone"
                                               required value="{{ Auth::user()->phone }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="email">Country:</label><br>
                                        <input type="text" id="country" name="user_country" placeholder="Enter the country" required value="{{ Auth::user()->country }}" >
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <label for="city">City:</label><br>
                                        <input type="text" id="city" name="user_city" placeholder="Enter the city" required value="{{ Auth::user()->city }}" >
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <label for="state">State:</label><br>
                                        <input type="text" id="state" name="user_state" placeholder="Enter the state" required value="{{ Auth::user()->state }}" >
                                    </div>


                                    <div class="col-md-12">
                                        <label >Upload Profile Picture: </label><br>
                                        <div  class="dropzone" id="my-awesome-dropzone">
                                            <div class="dz-message">
                                                Drag and drop files here or click to upload.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <div class="btn mt-4">
                                        <input type="hidden" id="user_role" value="{{ Auth::user()->roles->first()->slug }}">
                                    <button class="gradient_btn" id="update_user_profile" type="submit">Update Profile
                                    </button>
                                        <div id="message"></div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"     ></script>
    <script>
        $(document).ready(function () {
            $('#update_user_profile').on('click', function () {
                // Get individual values
                let name = $('#name').val();
                let phone = $('#phone').val();
                let country = $('#country').val();
                let city = $('#city').val();
                let state = $('#state').val();

                // Create a FormData object to hold data including the uploaded file
                let formData = new FormData();
                formData.append('customer_name', name);
                formData.append('user_phone', phone);
                formData.append('user_country', country);
                formData.append('user_city', city);
                formData.append('user_state', state);

                // If you have a file upload (for example, from Dropzone), add it to the FormData
                let profilePicture = $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles()[0];
                if (profilePicture) {
                    formData.append('profile_picture', profilePicture);
                }

                let userRole = $('#user_role').val();
            let url;

            // Determine the correct route URL based on the role
            if (userRole === 'admin') {
                url = "{{ route('admin_update_profile') }}";
            } else if (userRole === 'general_user') {
                url = "{{ route('user_update_profile') }}";
            } else if (userRole === 'content_creator') {
                url = "{{ route('creator_update_profile') }}";
            }

                $.ajax({
                    url: url, // Replace with your update route
                    type: 'POST',
                    data: formData,
                    contentType: false, // Important for file upload
                    processData: false, // Important for file upload
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function () {
                        // Optional: Show loading spinner or disable the button
                        $('#message').html('<p>Updating profile...</p>');
                    },
                    success: function (response) {
                        let message = '';
                        if (response.success) {
                            message = '<p class="text-success">Profile updated successfully!</p>';
                             setTimeout(function() { 
                                location.reload();
                            }, 2000);
                        } else {
                            // Handle validation errors
                            message = '<ul class="text-danger">';
                            $.each(response.errors, function (key, error) {
                                message += '<li>' + error + '</li>';
                            });
                            message += '</ul>';
                        }
                        $('#message').html(message);
                    },
                    error: function (xhr, status, error) {
                        // Handle errors
                        console.log(xhr.responseText);
                        $('#message').html('<p class="text-danger">Something went wrong. Please try again.</p>');
                    },
                    complete: function () {
                        // Optional: Hide loading spinner or enable the button
                    }
                });
            });
        });
    </script>

@endsection
