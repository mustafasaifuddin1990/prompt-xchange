<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <title>{{$title}}</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{asset('backend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
    <link rel="icon" href="{{asset('front/assets/img/logo.png')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" crossorigin="anonymous" />
      <!-- FancyBox CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.7/axios.min.js" integrity="sha512-DdX/YwF5e41Ok+AI81HI8f5/5UsoxCVT9GKYZRIzpLxb8Twz4ZwPPX+jQMwMhNQ9b5+zDEefc+dcvQoPWGNZ3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include MediumEditor CSS -->
    <link href="https://cdn.jsdelivr.net/npm/medium-editor@5.23.5/dist/css/medium-editor.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/medium-editor@5.23.5/dist/css/themes/default.min.css" rel="stylesheet">
    <!-- Include MediumEditor JS -->
    <script src="https://cdn.jsdelivr.net/npm/medium-editor@5.23.5/dist/js/medium-editor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.7/axios.min.js" integrity="sha512-DdX/YwF5e41Ok+AI81HI8f5/5UsoxCVT9GKYZRIzpLxb8Twz4ZwPPX+jQMwMhNQ9b5+zDEefc+dcvQoPWGNZ3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- FancyBox JS -->
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <style>
        ul.notification-box_ul > li a {
            gap: 10px;
            text-decoration: none;
        }

    </style>
</head>
<header>
    <div class="dashboard_header d-flex justify-content-end">
        <div class="search_form">
            <form action="/search" method="get">
                <input type="text" id="search" name="query" placeholder=" search...">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="header_notification d-flex">
            <a href="javascript:;" class="faq"><i class="fa-solid fa-question"></i></a>
            <a href="javascript:;"><div class="new_noti"></div><i class="fa-solid fa-message"></i></a>
            <a onclick="Notification_box(this)" id="Notification_box" href="javascript:void(0);"><i class="fa-regular fa-bell"></i></a>

        </div>
        <div class="all_notification">
            <div class="close_btn_notification">
                <a onclick="Notification_box(this)" href="javascript:void(0);"><i class="far fa-times-circle"></i></a>
            </div>
            <div class="all_data_notification">
                <ul class="notification-box_ul">

                </ul>
            </div>
        </div>
        <div class="prof_box ">
            <div class="prof_inner d-flex">
               @if(auth()->user()->user_picture)
    <img src="{{ asset(auth()->user()->user_picture)}}" alt="User Profile Picture">
@else
    <img src="{{ asset('backend/assets/img/account_img.png') }}" alt="Default Profile Picture">
@endif

                <div class="prof_inf">
                    <div class="name">{{Auth::user()->name}}</div>
                    <div class="ac_title">
                        @if(Auth::check())
                            @foreach(Auth::user()->roles as $role)
                                {{ $role->name }}
                                @if (!$loop->last), @endif
                            @endforeach
                        @else
                            No roles assigned
                        @endif
                    </div>

                </div>
            </div>
            <div class="down">
                <a href="javascript:;"><i class="fa-solid fa-chevron-down"></i></a>
                <div class="xtra_links" style="display: none;">
            	            <div class="drops_Down_inner" style="">
            	                <a href="{{route('user_dashboard')}}"><svg class="svg-inline--fa fa-house" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="house" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z"></path></svg><!-- <i class="fas fa-home"></i> Font Awesome fontawesome.com --> Dashboard</a>
            	                <a href="{{route('logout')}}" id="logoutLink">

                                    <svg class="svg-inline--fa fa-right-from-bracket" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="right-from-bracket" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M96 480h64C177.7 480 192 465.7 192 448S177.7 416 160 416H96c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h64C177.7 96 192 81.67 192 64S177.7 32 160 32H96C42.98 32 0 74.98 0 128v256C0 437 42.98 480 96 480zM504.8 238.5l-144.1-136c-6.975-6.578-17.2-8.375-26-4.594c-8.803 3.797-14.51 12.47-14.51 22.05l-.0918 72l-128-.001c-17.69 0-32.02 14.33-32.02 32v64c0 17.67 14.34 32 32.02 32l128 .001l.0918 71.1c0 9.578 5.707 18.25 14.51 22.05c8.803 3.781 19.03 1.984 26-4.594l144.1-136C514.4 264.4 514.4 247.6 504.8 238.5z"></path></svg><!-- <i class="fas fa-sign-out-alt"></i> Font Awesome fontawesome.com --> Logout</a>

            	            </div>
            	            <!--
            	           </li-->

                </div>
            </div>
        </div>
    </div>
</header>
<div id="addBlog" class="modal fade started_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <h4>Add Blog</h4>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category_id" required>
                        <!-- Options will be dynamically populated -->
                    </select>
                </div>
                <div class="form">
                    <div class="form-group">
                        <label for="blog_name">Blog Name</label>
                        <input type="text" id="blog_name" name="blog_title" placeholder="Enter blog name" required>
                    </div>

                    <div class="form-group">
                        <label for="blog_desc">Blog Description</label>
                        <textarea id="blog_desc" name="blog_desc" placeholder="Enter blog description" rows="5" required></textarea>
                    </div>
                    <div class="form-group ">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url(https://2.bp.blogspot.com/-l9nGy2e3PnA/XLzG5A6u_cI/AAAAAAAAAgI/31bl8XZOrTwN0kTN8c18YOG3OhNiTUrsQCLcBGAs/s1600/rocket.png);">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button id="blogsubmit" class="gradient_btn d-block">Save </button>
                    <div id="loader"></div>
                    <div id="responseMessage" style="margin-top: 10px;"></div>
                </div>
            </div>
        </div>

    </div>
</div>


<div id="categoryadd" class="modal fade started_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <h4>Add Category</h4>
                <div class="form">
                    <div class="form-group">
                        <label for="blog_name">Category Name</label>
                        <input type="text" id="category_name" name="category_name" placeholder="Enter category name" required>
                    </div>
                    <button id="categorysubmit" class="gradient_btn d-block">Save </button>
                    <div id="loader"></div>
                    <div id="responseMessage" style="margin-top: 10px;"></div>
                </div>
            </div>
        </div>

    </div>
</div>


<div id="categoryedit" class="modal fade started_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <h4>Update Category</h4>
                <div class="form">
                    <input type="hidden" id="editCategoryId" name="category_id">
                    <div class="form-group">
                        <label for="blog_name">Category Name</label>
                        <input type="text" id="update_category_name" name="update_category_name" placeholder="Enter category name" required>
                    </div>
                    <button id="update_categorysubmit" class="gradient_btn d-block">Save </button>
                    <div id="loader"></div>
                    <div id="responseMessage" style="margin-top: 10px;"></div>
                </div>
            </div>
        </div>

    </div>
</div>



<div id="updateBlog" class="modal fade started_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <h4>Update Blog</h4>
                <div class="form-group">
                     <input type="hidden" id="editblogid" name="editblogid">
                    <label for="update_category">Category</label>
                    <select id="update_category" name="update_category" required>
                            <!-- Categories will be populated here dynamically -->
                        </select>
                </div>
                <div class="form">
                    <div class="form-group">
                        <label for="blog_name">Blog Name</label>
                        <input type="text" id="blog_title" name="blog_title" placeholder="Enter blog name" required>
                    </div>

                    <div class="form-group">
                        <label for="update_blog_desc">Blog Description</label>
                        <textarea id="update_blog_desc" name="update_blog_desc" placeholder="Enter blog description" rows="5" required></textarea>
                    </div>
                    <div class="form-group ">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" class="getimage" style="background-image: url(https://2.bp.blogspot.com/-l9nGy2e3PnA/XLzG5A6u_cI/AAAAAAAAAgI/31bl8XZOrTwN0kTN8c18YOG3OhNiTUrsQCLcBGAs/s1600/rocket.png);">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button id="updateblogsubmit" class="gradient_btn d-block">Save </button>
                    <div id="loader"></div>
                    <div id="responseMessage" style="margin-top: 10px;"></div>
                </div>
            </div>
        </div>

    </div>
</div>
</html>

<body>
    @include('backend.partials.sidebar')
    @yield('content')
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('backend/assets/js/custom.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js" integrity="sha512-VCEWnpOl7PIhbYMcb64pqGZYez41C2uws/M/mDdGPy+vtEJHd9BqbShE4/VNnnZdr7YCPOjd+CBmYca/7WWWCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fetch categories and populate the dropdown
            $.ajax({
                url: "{{ route('categories') }}", // Adjust this URL to match your route
                method: "GET",
                success: function(response) {
                    var categories = response;
                    var categorySelect = $('#category');
                    categorySelect.empty();
                    categorySelect.append('<option value="" disabled selected>Select Category</option>');
                    $.each(categories, function(index, category) {
                        categorySelect.append('<option value="' + category.id + '">' + category.name + '</option>');
                    });
                },
                error: function(xhr) {
                    console.log('Error fetching categories:', xhr);
                }
            });
        });
    </script>
    <script>
        tinymce.init({
            selector: "#blog_desc",
            height: "480",
            menubar: false,
            toolbar: [
                "styleselect fontselect fontsizeselect",
                "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
                "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview | code"
            ],
            forced_root_block: true,
            force_br_newlines: true,
            force_p_newlines: true,
            convert_newlines_to_brs: true,
            plugins: "advlist autolink link image lists charmap print preview code",
            content_style: "body { background-color: #fff; }", // Editor content background
            setup: function(editor) {
                editor.on('init', function() {
                    // Apply custom styles to toolbar and header after initialization
                    let toolbar = editor.contentDocument.querySelector('.tox-toolbar');
                    if (toolbar) {
                        toolbar.style.backgroundColor = "#4CAF50"; // Set the toolbar background color
                    }
                    let menubar = editor.contentDocument.querySelector('.tox-menubar');
                    if (menubar) {
                        menubar.style.backgroundColor = "#4CAF50"; // Set the menubar background color if enabled
                    }
                });
            }
        });

              tinymce.init({
            selector: "#update_blog_desc",
            height: "480",
            menubar: false,
            toolbar: [
                "styleselect fontselect fontsizeselect",
                "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
                "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview | code"
            ],
            forced_root_block: true,
            force_br_newlines: true,
            force_p_newlines: true,
            convert_newlines_to_brs: true,
            plugins: "advlist autolink link image lists charmap print preview code",
            content_style: "body { background-color: #fff; }", // Editor content background
            setup: function(editor) {
                editor.on('init', function() {
                    // Apply custom styles to toolbar and header after initialization
                    let toolbar = editor.contentDocument.querySelector('.tox-toolbar');
                    if (toolbar) {
                        toolbar.style.backgroundColor = "#4CAF50"; // Set the toolbar background color
                    }
                    let menubar = editor.contentDocument.querySelector('.tox-menubar');
                    if (menubar) {
                        menubar.style.backgroundColor = "#4CAF50"; // Set the menubar background color if enabled
                    }
                });
            }
        });

    </script>
    <script>
        $(document).ready(function() {
            $('#blogsubmit').on('click', function(e) {
                e.preventDefault();
                $(this).prop('disabled', true);
                $('#loader').show();

                var title = $('#blog_name').val();
                var category =$('#category').val();
                var content = tinymce.get('blog_desc').getContent();
                var image = $('#imageUpload')[0].files[0];
                var formData = new FormData();
                formData.append('blog_title', title);
                formData.append('category',category);
                formData.append('blog_desc', content);
                formData.append('blog_image', image);
                $('#responseMessage').empty();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('blogs.store') }}",
                    method: "POST",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    processData: false, // Necessary for file upload
                    contentType: false,
                    success: function(response) {
                        $('#responseMessage').html('<div class="alert alert-success">Blog added successfully!</div>');
                        $('#submitBlog').prop('disabled', false);
                        $('#loader').hide();
                        location.reload();
                    },
                    error: function(xhr) {
                        $('#responseMessage').html('<div class="alert alert-danger">Error: ' + xhr.responseText + '</div>');
                        $('#submitBlog').prop('disabled', false);
                        $('#loader').hide();
                    }
                });
            });


            $('#categorysubmit').on('click', function(e) {
                e.preventDefault();
                $(this).prop('disabled', true);
                $('#loader').show();

                var category_name = $('#category_name').val();
                var formData = new FormData();
                formData.append('category_name', category_name);
                $('#responseMessage').empty();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('category.store') }}",
                    method: "POST",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    processData: false, // Necessary for file upload
                    contentType: false,
                    success: function(response) {
                        $('#responseMessage').html('<div class="alert alert-success">Category added successfully!</div>');
                        $('#submitBlog').prop('disabled', false);
                        $('#loader').hide();
                        location.reload();
                    },
                    error: function(xhr) {
                        $('#responseMessage').html('<div class="alert alert-danger">Error: ' + xhr.responseText + '</div>');
                        $('#submitBlog').prop('disabled', false);
                        $('#loader').hide();
                    }
                });
            });
        });

    </script>

    <script>

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });


        Dropzone.options.myAwesomeDropzone = {
            url: "test",  // Add the correct upload URL here
            maxFilesize: 5, // MB
            acceptedFiles: ".jpeg,.jpg,.png,.pdf,.doc,.docx,.xls,.xlsx,.csv",
            success: function(file, response) {
                console.log('File uploaded successfully.');
            },
            error: function(file, response) {
                console.error('Error uploading file:', response);
            }
        };
    </script>

    <script>
        document.getElementById('logoutLink').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default anchor behavior

            fetch('{{ route('logout') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(response => {
                if (response.ok) {
                    window.location.href = '/'; // Redirect to home page
                }
            }).catch(error => console.error('Logout failed:', error));
        });
    </script>


    <script>

        const Notification_box = async(data)=>{
            const id = {{auth()->user()->id}};
            const button_notifcation = data;
            const box_notifications = document.getElementsByClassName('all_notification');
            let content = '';
            box_notifications[0].classList.toggle('show');


            if(box_notifications[0].classList.contains('show')){
                try {
                    const response = await axios.get(`{{route('notifications.all')}}?id=${id}`);
                    const content_notification_box = document.querySelector('.all_data_notification ul');

                    if (response.data.message && response.data.message.length > 0) {
                        const All_Data = response.data.message;
                        All_Data.forEach((items) => {
                            if(items.post_id && items.comment_id){

                                content += `

                                    <li>
                                        <a class="d-flex" href="/generate/${items.post_id}/#main_comments" target="_blank">
                                        <div class="flex-shrink-0 bg-light-primary"> `;
                                    if (items.notifications_sendor.user_picture != null){
                                        content +=`<img src="${items.notifications_sendor.user_picture}" alt="Profile Picture">`;
                                    }else{
                                        content +=`<img src="/backend/assets/img/profile.png" alt="Profile Picture">`;
                                    }
                                    content+=`
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6>${items.notifications_sendor.name}</h6>
                                            <p>${items.message}</p>
                                        </div>
                                        </a>
                                    </li>
                                `;

                            }
                            else if(items.status === "in_progress"){
                                content += `

                                    <li>
                                        <div class="flex-shrink-0 bg-light-primary"> `;
                                if (items.notifications_sendor.user_picture != null){
                                    content +=`<img src="${items.notifications_sendor.user_picture}" alt="Profile Picture">`;
                                }else{
                                    content +=`<img src="/backend/assets/img/profile.png" alt="Profile Picture">`;
                                }
                                content+=`
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6>${items.notifications_sendor.name}</h6>
                                            <p>${items.message}</p>
                                            <div class="button_links">
                                                <ul>
                                                    <li><a onclick="accept_request(${items.request_id}, ${items.id})" href="javascript:void(0);">Accept</a></li>
                                                    <li><a onclick="reject_request(${items.request_id}, ${items.id})" href="javascript:void(0);">Reject</a></li>
                                                <ul/>
                                            </div>
                                        </div>

                                    </li>
                                `;
                            }
                            else if(items.status === "accepted"){
                                content += `

                                    <li>
                                        <div class="flex-shrink-0 bg-light-primary"> `;
                                if (items.notifications_sendor.user_picture != null){
                                    content +=`<img src="${items.notifications_sendor.user_picture}" alt="Profile Picture">`;
                                }else{
                                    content +=`<img src="/backend/assets/img/profile.png" alt="Profile Picture">`;
                                }
                                content+=`
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6>${items.notifications_sendor.name}</h6>
                                            <p>${items.message}</p>
                                            <div class="button_links">
                                               <p class='success-notification'>Accepted</p>
                                            </div>
                                        </div>

                                    </li>
                                `;
                            }
                            else if(items.status === "rejected"){
                                content += `

                                    <li>
                                        <div class="flex-shrink-0 bg-light-primary"> `;
                                if (items.notifications_sendor.user_picture != null){
                                    content +=`<img src="${items.notifications_sendor.user_picture}" alt="Profile Picture">`;
                                }else{
                                    content +=`<img src="/backend/assets/img/profile.png" alt="Profile Picture">`;
                                }
                                content+=`
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6>${items.notifications_sendor.name}</h6>
                                            <p>${items.message}</p>
                                            <div class="button_links">
                                               <p class='error-notification'>Rejected</p>
                                            </div>
                                        </div>

                                    </li>
                                `;
                            }
                            else{

                                content += `
                                <li>
                                    <div class="flex-shrink-0 bg-light-primary"> `;
                                if (items.notifications_sendor.user_picture != null){
                                    content +=`<img src="${items.notifications_sendor.user_picture}" alt="Profile Picture">`;
                                }else{
                                    content +=`<img src="/backend/assets/img/profile.png" alt="Profile Picture">`;
                                }
                                content+=`
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6>${items.notifications_sendor.name}</h6>
                                        <p>${items.message}</p>
                                    </div>
                                </li>
                                `;
                            }
                        })
                        content_notification_box.innerHTML = content;
                    }
                    else {
                        content = `
                            <li>
                                <div class="flex-grow-1">
                                    <p>No Notification Found</p>
                                </div>
                            </li>
                    `;
                        content_notification_box.innerHTML = content;
                    }
                }catch (e){
                    console.log(e);
                }
            }

        }



        const accept_request = async (request_id, noti_id) => {
            const payload = {
                id: request_id,
                notification_id: noti_id
            }
            let button_links = document.querySelector('.button_links');



            try{

                const response = await axios.post('{{route('accept.hire_creator')}}',payload)

                if(response.status){
                    button_links.innerHTML = "<p class='success-notification'>Accepted</p>";
                }else{
                    button_links.innerHTML = "<p class='error-notification'>Error</p>";
                }


            }catch (e){
                console.log(e);
            }
        }

        const reject_request = async (request_id, noti_id) => {
            const payload = {
                id: request_id,
                notification_id: noti_id
            }
            let button_links = document.querySelector('.button_links');



            try{

                const response = await axios.post('{{route('reject.hire_creator')}}',payload)

                if(response.status){
                    button_links.innerHTML = "<p class='error-notification'>Rejected</p>";
                }else{
                    button_links.innerHTML = "<p class='error-notification'>Error</p>";
                }


            }catch (e){
                console.log(e);
            }
        }
    </script>
</body>

</html>
