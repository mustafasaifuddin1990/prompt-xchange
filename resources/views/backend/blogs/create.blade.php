@extends('backend/partials/header')
@section('content')
    <section class="dashboard_secs acc_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="head_title d-flex">
                        <img src="{{asset('backend/assets/img/square.png')}}" alt="">
                        <h3>Add New Blog</h3>
                    </div>
                </div>

                <div class="col-md-12 ">
                    <div class="black_sec">
                        <div class="head_title">
                            <h3>Add Details</h3>
                            <div class="pricing_form">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="name">Blog Title:</label><br>
                                        <input type="text" id="blog_title" name="blog_title" placeholder="Enter the title"
                                               required><br><br>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="price">Price:</label><br>
                                        <input type="number" id="price" name="price" placeholder="Enter the price"
                                               step="0.01" min="0" required><br><br>
                                    </div>
                                    <div class="col-12">



                                    </div>
                                    <div class="col-12">
                                        <button class="gradient_btn" id="createPricingForm" type="submit">Submit
                                        </button>
                                        <div id="loader">
                                            <div class="spinner"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
    <script>
        $(document).ready(function() {
            $('.gradient_btn').on('click', function(e) {
                e.preventDefault();
                $('#message').remove();
                let $button = $(this);
                $button.prop('disabled', true);
                $('#loader').show();
                let name = $('#name').val();
                let price = $('#price').val();
                let features = [];
                $('input[name="features[]"]:checked').each(function() {
                    features.push($(this).val());
                });

                $.ajax({
                    url: "{{ route('prices.store') }}",
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: name,
                        price: price,
                        features: features
                    },
                    success: function(response) {
                        setTimeout(function() {
                            $button.prop('disabled', false);
                            $('#loader').hide(); // Hide loader
                            $('.gradient_btn').after('<div id="message" class="success-msg" >' + response.success + '</div>');
                        }, 3000);
                    },
                    error: function(response) {
                        let errors = response.responseJSON.errors;
                        let errorMessages = '<div id="message" class="error-msg" >';
                        $.each(errors, function(key, value) {
                            errorMessages += '<p>' + value[0] + '</p>';
                        });
                        errorMessages += '</div>';

                        $('.gradient_btn').after(errorMessages);
                    },
                    complete: function() {
                        $button.prop('disabled', false);
                        $('#loader').hide(); // Hide loader
                    }
                });
            });
        });
    </script>



@endsection
