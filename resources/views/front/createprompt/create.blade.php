@extends('front/partials/header')

@section('content')
<section class="create_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 create_cont">
                <h5> <img src="{{ asset('front/assets/img/cloud.png') }}">AI Image Generator</h5>
                <!--<p>Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit Voluptatem Accusantium</p>-->
            </div>
        </div>
        <div class="row black_sec">
            <div class="col-md-4 col-sm-12">
                <div class="create_side">
                  <div class="model_title">Select Model</div>
                   <select id="model_name" name="model_name">
                            <option value="">Choose an option</option>
                            <option value="SDXL">SDXL Model</option>
                            <option value="Flux">Flux Model</option>

                        </select>
                        <textarea name="positive_prompt" id="positive_prompt" placeholder="Enter Positive Prompt"></textarea>
                        <textarea name="negative_prompt" id="negative_prompt" placeholder="Enter Negative Prompt"></textarea>

                        <div class="slider_range">
                            <div class="side_range_single">
                                <div class="range-slider">
                                    <div class="range_cont">Samples<span class="max_range">4</span></div>
                                    <input class="range-slider__range" type="range" name="samples" value="5" min="1" max="4">
                                    <span class="range-slider__value">4</span>
                                </div>
                            </div>

                            <div class="side_range_single">
                                <div class="range-slider">
                                    <div class="range_cont">Steps<span class="max_range">50</span></div>
                                    <input class="range-slider__range" type="range" name="steps" value="5" min="5" max="50">
                                    <span class="range-slider__value">5</span>
                                </div>
                            </div>
                            <div class="side_range_single">
                                <div class="range-slider">
                                    <div class="range_cont">Guidance Scale<span class="max_range">35</span></div>
                                    <input class="range-slider__range" type="range" name="cdg_scale" value="15" min="0" max="35">
                                    <span class="range-slider__value">15</span>
                                </div>
                            </div>
                        </div>
                        <div class="img_up_btn">
                            <span>Image Prompt</span>
                            <div class="file_btn">
                                <input type="file" id="file" name="file">
                            </div>
                            <div class="upload_btn">
                                <img src="{{ asset('front/assets/img/cloud.png') }}">
                                <span>Upload</span>
                            </div>
                        </div>
                        <div class="img_up_btn">
                            <span>Inpainting</span>
                            <div class="file_btn">
                                <input type="file" id="inpainiting" name="inpainiting">
                            </div>
                            <div class="upload_btn">
                                <img src="{{ asset('front/assets/img/cloud.png') }}">
                                <span>Upload</span>
                            </div>
                        </div>
                        <button id="generate-image-btn" class="gradient_btn">Generate Image</button>
                        <img id="ajax-loader" style="display:none; width:50px;" src="{{asset('front/assets/img/animation-loader.gif')}}">

                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="image_output_sec create_img">
                    <span>Image Output</span>
                    <img id="output-image" src="" alt="Generated Image" style="display:none;">
                    <img id="image-loader" style="display:none; width:99px; height:99px;" src="{{asset('front/assets/img/animation-loader.gif')}}">
                    <p style="display:none;" id="error-message" ></p>
                </div>
                <div class="image_input_sec create_img">
                    <span>Image Input</span>
                    <img id="input-image" src="" alt="Input Image" style="display:none;">
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    function displaySelectedImage(inputElement, imageElement) {
    var file = inputElement.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(imageElement).attr('src', e.target.result).show();
        };
        reader.readAsDataURL(file);
    } else {
        $(imageElement).hide();
    }
}


// Event listeners for both file inputs
$('#file').on('change', function() {
    displaySelectedImage(this, '#input-image');
});

$('#inpainiting').on('change', function() {
    displaySelectedImage(this, '#input-image');
});
$('#generate-image-btn').on('click', function(event) {
    event.preventDefault();

    // Disable the button and show the AJAX loader
    $(this).prop('disabled', true);
    $('#ajax-loader').show();
    $('#image-loader').show();

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    var model_name = $('select[name="model_name"]').val();
    var positivePrompt = $('#positive_prompt').val();
    var negativePrompt = $('#negative_prompt').val();
    var steps = $('input[name="steps"]').val();
    var cdgScale = $('input[name="cdg_scale"]').val();
    var samples = $('input[name="samples"]').val();
    var file = $('#file')[0].files[0];
    var inpainiting = $('#inpainiting')[0].files[0];

    var formData = new FormData();
    formData.append('model_name', model_name);
    formData.append('positive_prompt', positivePrompt);
    formData.append('negative_prompt', negativePrompt);
    formData.append('steps', steps);
    formData.append('samples',samples)
    formData.append('cdg_scale', cdgScale);
    if (file) formData.append('image_prompt', file);
    if (inpainiting) formData.append('inpainiting', inpainiting);

    $.ajax({
        url: "{{ route('user_generate_image') }}",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
            console.log(response);

            if (response.status === 'success') {
                var outputContainer = $('.image_output_sec');
                outputContainer.empty(); // Clear previous images
                var images = response.output;

                if (images.length === 1) {
                    // 1 image: Take up the entire window
                    outputContainer.append(`<img src="${images[0]}" class="full-width">`);
                } else if (images.length === 2) {
                    // 2 images: 1x2 in a column
                    images.forEach(function(img) {
                        outputContainer.append(`<img src="${img}" class="half-width">`);
                    });
                } else if (images.length === 3) {
                    // 3 images: 1x2 in the first column, 1 in the second column
                    outputContainer.append(`<div class="column"><img src="${images[0]}" class="half-width"><img src="${images[1]}" class="half-width"></div>`);
                    outputContainer.append(`<div class="column"><img src="${images[2]}" class="full-width"></div>`);
                } else if (images.length >= 4) {
                    // 4 images: 2x2 grid
                    outputContainer.append(`<div class="column"><img src="${images[0]}" class="half-width"><img src="${images[1]}" class="half-width"></div>`);
                    outputContainer.append(`<div class="column"><img src="${images[2]}" class="half-width"><img src="${images[3]}" class="half-width"></div>`);
                }

                $('#error-message').text(''); // Clear any previous error messages
            } else {
                $('#error-message').text(response.message || 'Failed, Try Again');
            }
        },
        error: function(xhr) {
            var errorMessage = 'An error occurred. Please try again later.';
            if (xhr.responseJSON && xhr.responseJSON.error_log && xhr.responseJSON.error_log.response && xhr.responseJSON.error_log.response.message) {
                errorMessage = xhr.responseJSON.error_log.response.message;
            }
            $('#error-message').text(errorMessage);
        },
        complete: function() {
            // Re-enable the button and hide the AJAX loaders
            $('#generate-image-btn').prop('disabled', false);
            $('#ajax-loader').hide();
            $('#image-loader').hide();
        }
    });
});


});

</script>


@endsection
