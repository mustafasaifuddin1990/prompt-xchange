@extends('backend/partials/header')
@section('content')
    <section class="dashboard_secs acc_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <div class="head_title d-flex">
                            <img src="{{asset('backend/assets/img/square.png')}}" alt="">
                            <h3>All Blogs</h3>
                        </div>
                        <div class="btn_div">
                            <a id="addBlog" href="javascript:void(0);" class="gradient_btn d-block" data-toggle="modal" data-target="#addBlog">Add Blog</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 ">
                    <div class="black_sec">
                        <div class="head_title">
                            <!-- <h3>Add Details</h3> -->
                            <div class="pricing_form">
                                <table class="table table-borderless card-header-tabs" id="blogsTable">
                                    <thead>
                                    <tr>
                                        <th>S#no</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th> Name</th>
                                        <th>Content</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- Dynamic rows will be inserted here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Add Blog Modal -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
    <script>
        $(document).ready(function() {
            function loadBlogs() {
                $.ajax({
                    url: "{{ route('blogs.get') }}",
                    method: "GET",
                    success: function(data) {
                        let rows = '';
                        if (data.length === 0) {
                            rows = '<tr><td colspan="5" style="text-align: center;">No blogs available.</td></tr>';
                        } else {
                            $.each(data, function(index, blog) {
                                var defaultImage = "{{ asset('front/assets/img/blogs/2.png') }}";
                                rows += '<tr>';
                                rows += '<td>' + (index + 1) + '</td>';
                                rows += '<td>' + (blog.category ? blog.category.name : 'No Category') + '</td>'; // Add category name
                                var blogImage = blog.image ? blog.image : defaultImage;
                                rows += '<td><img src="' + blogImage + '" class="blog-image" width="120px;"></td>';
                                rows += '<td>' + blog.title + '</td>';
                                rows += '<td>' + blog.content + '</td>';
                                rows += '<td>' + blog.publish_date + '</td>';
                                rows += '<td>';
                                rows += '<a href="javascript:;" class="edit" data-toggle="modal" data-target="#updateBlog" data-id="' + blog.id + '"><i class="fa-solid fa-pencil"></i></a>';
                                rows += '<a href="javascript:;" class="delete" data-id="' + blog.id + '"><i class="fa-solid fa-trash"></i></a>';
                                rows += '</td>';
                                rows += '</tr>';
                            });
                        }

                        $('#blogsTable tbody').html(rows);
                    },
                    error: function() {
                        alert('Failed to load blogs.');
                    }
                });
            }
            loadBlogs();
            
            
         $(document).on('click', '.edit', function() {
    var blogID = $(this).data('id');  // Get the blog ID from the button's data attribute

    // Make an AJAX request to fetch blog and category data
$.ajax({
    url: "{{ route('blogs.edit', ':id') }}".replace(':id', blogID),
    method: 'GET',
    success: function(response) {
        if (response.success === true) {
            var blog = response.data.blog;
            var categories = response.data.categories;

            // Populate the blog details
            $('#editblogid').val(blog.id);
            $('#blog_title').val(blog.title);
            tinymce.get('update_blog_desc').setContent(blog.content);

            // Populate categories dropdown
            var categoryDropdown = $('#update_category');
            categoryDropdown.empty();  // Clear the dropdown first

            // Loop through the categories and append to dropdown
            $.each(categories, function(index, category) {
                
                var selected = (category.id === blog.category_id) ? 'selected' : '';  // Check for the selected category
                categoryDropdown.append(`<option value="${category.id}" ${selected}>${category.name}</option>`);
            });
               // Update the image preview
            if (blog.image) {
                $('.getimage').css('background-image', `url(${blog.image})`);
            } else {
                $('.getimage').css('background-image', `url('default-image-url')`); // Fallback image
            }

            // Show the modal after populating the data
            $('#updateBlog').modal('show');
        } else {
            alert('Blog not found.');
        }
    },
    error: function(xhr, status, error) {
        console.error('Failed to load blog details:', error);
        alert('Failed to load blog details.');
    }
});

});

            
            
            

            $('#blogsTable').on('click', '.delete', function() {
                const id = $(this).data('id');
                if (confirm('Are you sure you want to delete this blog?')) {
                    $.ajax({
                        url: "{{ route('blogs.destroy', ':id') }}".replace(':id', id), // Use route() helper to build URL
                        method: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}" // Include CSRF token
                        },
                        success: function(response) {
                            loadBlogs(); // Reload the table
                        },
                        error: function(xhr) {
                            if (xhr.status === 404) {
                                alert('Blog not found.');
                            } else {
                                alert('An error occurred while deleting the blog.');
                            }
                        }
                    });
                }
            });
            
            
          // Update Blog Form Submission
$('#updateblogsubmit').on('click', function(event) {
    event.preventDefault(); // Prevent the default form submission

    var editblogid = $('#editblogid').val(); 
    var blog_title = $('#blog_title').val(); 
    var blog_content = tinymce.get('update_blog_desc').getContent();
    var category = $('#update_category').val();
    var image = $('#imageUpload')[0].files[0]; // Get the selected image file

    // Use FormData to handle file upload
    var formData = new FormData();
    formData.append('blog_title', blog_title);
    formData.append('blog_content', blog_content);
    formData.append('category', category);
    formData.append('blog_image', image); // Append the image file
    formData.append('_token', "{{ csrf_token() }}"); // Append the CSRF token

    $.ajax({
        url: "{{ route('blogs.update', ':id') }}".replace(':id', editblogid),
        method: 'POST', // Use POST for form data with files
        data: formData,
        processData: false, // Prevent jQuery from processing the data
        contentType: false, // Prevent jQuery from setting content-type header
        success: function(response) {
            if (response.success) {
                location.reload();
                loadCategories();
                $('#categoryedit').modal('hide');
                $('#responseMessage').html('<div class="alert alert-success">Category updated successfully.</div>');
            } else {
                $('#responseMessage').html('<div class="alert alert-danger">Failed to update category.</div>');
            }
        },
        error: function(xhr, status, error) {
            console.error('Failed to update category:', error);
            $('#responseMessage').html('<div class="alert alert-danger">Failed to update category.</div>');
        }
    });
});


            // Initial Load
            loadCategories();


        });
    </script>
@endsection
