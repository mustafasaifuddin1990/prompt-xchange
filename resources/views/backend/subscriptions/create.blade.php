@extends('backend/partials/header')
@section('content')
    <section class="dashboard_secs acc_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="head_title d-flex">
                        <img src="{{asset('backend/assets/img/square.png')}}" alt="">
                        <h3>Add New Pricing</h3>
                    </div>
                </div>

                <div class="col-md-12 ">
                    <div class="black_sec">
                        <div class="head_title">
                            <h3>Add Details</h3>
                            <div class="pricing_form">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="name">Name:</label><br>
                                        <input type="text" id="name" name="name" placeholder="Enter the name"
                                               required><br><br>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="price">Price:</label><br>
                                        <input type="number" id="price" name="price" placeholder="Enter the price"
                                               step="0.01" min="0" required><br><br>
                                    </div>
                                    <div class="col-12">
                                        <fieldset>
                                            <legend>Select Features:</legend>

                                            <div class="check">
                                                <input type="checkbox" id="free_tier" name="features[]"
                                                       value="Everything in Free Tier">
                                                <label for="free_tier">Everything in Free Tier</label><br>
                                            </div>
                                            <div class="check"><input type="checkbox" id="analytics" name="features[]"
                                                                      value="Access to analytics">
                                                <label for="analytics">Access to analytics</label><br></div>
                                            <div class="check"><input type="checkbox" id="job_proposals" name="features[]"
                                                                      value="Receive job proposal from brand and marketers">
                                                <label for="job_proposals">Receive job proposal from brand and
                                                    marketers</label><br></div>
                                            <div class="check"><input type="checkbox" id="100_images" name="features[]"
                                                                      value="Include 100 image generations">
                                                <label for="100_images">Include 100 image generations</label><br></div>
                                            <div class="check"> <input type="checkbox" id="sd_tools" name="features[]"
                                                                       value="Access to SD Voice & Video A1 Tools">
                                                <label for="sd_tools">Access to SD Voice & Video A1 Tools</label><br></div>
                                            <div class="check"><input type="checkbox" id="50_images" name="features[]"
                                                                      value="Include 50 image generations">
                                                <label for="50_images">Include 50 image generations</label><br></div>
                                            <div class="check"> <input type="checkbox" id="prompt_xchange" name="features[]"
                                                                       value="Become Prompt Xchange community member">
                                                <label for="prompt_xchange">Become Prompt Xchange community member</label><br></div>
                                            <div class="check"><input type="checkbox" id="brand_portfolio" name="features[]"
                                                                      value="Build your brand & portfolio online">
                                                <label for="brand_portfolio">Build your brand & portfolio online</label><br></div>
                                        </fieldset><br>
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
