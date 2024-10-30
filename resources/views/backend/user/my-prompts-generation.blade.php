@extends('backend/partials/header')
@section('content')
    <section class="dashboard_secs acc_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                   <div class="d-flex justify-content-between align-items-baseline">
                       <div class="head_title d-flex">
                           <img src="{{asset('backend/assets/img/square.png')}}" alt="">
                           <h3>My Prompts</h3>

                       </div>
                     <div class="btn_div">
                           <a href="{{route('prompt.create')}}" class="gradient_btn d-block">Create a prompt</a>
                       </div>
                   </div>
                </div>

<div class="col-md-12">
    <div class="black_sec row">
        @if($promptGenerations->isEmpty())
            <div class="col-md-12">
                <p class="no-prompt-found">No prompt generations found for the current user.</p>
            </div>
        @else
            @foreach($promptGenerations as $promptGeneration)
                <div class=" mb-4">
                    <button type="button" class="btn btn-primary update-pricing" data-toggle="modal" data-target="#editPromptModal{{ $promptGeneration->id }}">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                    <h4>Prompt Generation #{{ $promptGeneration->id }}</h4>
                    <p>Model Name: {{ $promptGeneration->model_name }}</p>
                    <p>Positive Prompt: {{ $promptGeneration->positive_prompt }}</p>
                    <p>Negative Prompt: {{ $promptGeneration->negative_prompt }}</p>
                    <p>Samples: {{ $promptGeneration->samples }}</p>
                    <p>Steps: {{ $promptGeneration->steps }}</p>
                    <p>Prompt Pricing: {{ $promptGeneration->price }}</p>
                    <!-- Edit Button -->


                    <!-- Modal for Editing Prompt -->
                    <div id="editPromptModal{{ $promptGeneration->id }}" class="modal fade started_modal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
                                <div class="modal-body pricing_form">
                                    <h4>Update Prompt</h4>
                                    <div class="form-group">

                                        <fieldset>
                                            <legend>Select Categories:</legend>
                                            <div id="update_category_container">
                                                <!-- Checkboxes will be dynamically inserted here -->
                                            </div>
                                        </fieldset>

                                    </div>
                                    <div class="form-group">
                                        <label for="blog_name">Update Pricing</label>
                                        <input type="number" id="prompt_pricing_{{ $promptGeneration->id }}"
                                               name="prompt_pricing" placeholder="Enter Prompt Pricing" value="{{ $promptGeneration->price }}" required>
                                    </div>

                                    <div class="form">
                                        <input type="hidden" id="update_prompt_id_{{ $promptGeneration->id }}"
                                               value="{{ $promptGeneration->id }}">
                                        <button class="gradient_btn d-block updatepromptpricing"
                                                data-prompt-id="{{ $promptGeneration->id }}">Save</button>
                                        <div id="loader_{{ $promptGeneration->id }}"></div>
                                        <div id="responseMessage_{{ $promptGeneration->id }}" style="margin-top: 10px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h3>Generated Images</h3>
                        <div class="row">
                            @foreach($promptGeneration->generatedImages as $image)
                                <div class="col-md-3">
                                    <a href="{{ $image->image_url }}" data-fancybox="gallery-{{ $promptGeneration->id }}">
                                        <img style="border-radius:16px;" src="{{ $image->image_url }}" class="img-fluid" alt="Generated Image">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            // Fetch categories and populate the checkboxes
            $.ajax({
                url: "{{ route('prompt_categories') }}", // Adjust this URL to match your route
                method: "GET",
                success: function(response) {
                    var categories = response;
                    var container = $('#update_category_container');
                    container.empty();
                    $.each(categories, function(index, category) {
                        container.append(

                            '<div class="check">' +
                            '<input type="checkbox"    name="categories[]" value="' + category.id + '" id="category_' + category.id + '">' +
                            '<label  for="category_' + category.id + '">' + category.category_name + '</label>' +
                            '</div>'

                        );
                    });
                },
                error: function(xhr) {
                    console.log('Error fetching categories:', xhr);
                }
            });
        });
    </script>
    <script>
        var updatePromptUrl = "{{ route('creator.update.prompt') }}";
        var csrfToken = "{{ csrf_token() }}";

        $(document).ready(function () {
            $('.updatepromptpricing').click(function (e) {
                e.preventDefault();

                var promptId = $(this).data('prompt-id');
                let price = $('#prompt_pricing_' + promptId).val();
                let categories = [];
                $('input[name="categories[]"]:checked').each(function () {
                    categories.push($(this).val());
                });

                if (!price || categories.length === 0) {
                    $('#responseMessage_' + promptId).text("Please fill in all fields.");
                    return;
                }
                $('#loader_' + promptId).html('<img src="loader.gif" alt="loading...">');

                $.ajax({
                    url: updatePromptUrl,
                    type: 'POST',
                    data: {
                        _token: csrfToken,
                        id: promptId,
                        price: price,
                        categories: categories
                    },
                    success: function (response) {
                        $('#loader_' + promptId).html('');
                        if (response.success) {
                            $('#responseMessage_' + promptId).html('<p class="response-success ">' + response.message + '</p>');
                        } else {
                            $('#responseMessage_' + promptId).html('<p class="text-danger">Something went wrong.</p>');
                        }
                    },
                    error: function (xhr, status, error) {
                        $('#loader_' + promptId).html('');
                        $('#responseMessage_' + promptId).html('<p class="text-danger">Error: ' + error + '</p>');
                    }
                });
            });
        });
    </script>


@endsection
