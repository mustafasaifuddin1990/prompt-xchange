@extends('backend/partials/header')
@section('content')
    <section class="dashboard_secs acc_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <div class="head_title d-flex">
                            <img src="{{asset('backend/assets/img/square.png')}}" alt="">
                            <h3>All Categories</h3>
                        </div>
                        <div class="btn_div">
                            <a id="categoryadd" href="javascript:void(0);" class="gradient_btn d-block" data-toggle="modal" data-target="#categoryadd">Add Category</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 ">
                    <div class="black_sec">
                        <div class="head_title">
                            <!-- <h3>Add Details</h3> -->
                            <div class="pricing_form">
                                <table class="table table-borderless card-header-tabs" id="categoriesTable">
                                    <thead>
                                    <tr>
                                        <th>S#no</th>
                                        <th> Category Name</th>
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
            function loadCategories() {
                $.ajax({
                    url: "{{ route('categories') }}",
                    method: "GET",
                    success: function(data) {
                        let rows = '';
                        if (data.length === 0) {
                            rows = '<tr><td colspan="5" style="text-align: center;">No categories available.</td></tr>';
                        } else {
                            $.each(data, function(index, category) {
                                rows += '<tr>';
                                rows += '<td>' + (index + 1) + '</td>';
                                rows += '<td>' + category.name + '</td>';
                                rows += '<td>';
                                rows += '<a href="javascript:;"   data-toggle="modal" data-target="#categoryedit" class="edit" data-id="' + category.id + '"><i class="fa-solid fa-pencil"></i></a>';
                                rows += '<a href="javascript:;" class="delete" data-id="' + category.id + '"><i class="fa-solid fa-trash"></i></a>';
                                rows += '</td>';
                                rows += '</tr>';
                            });
                        }

                        $('#categoriesTable tbody').html(rows);
                    },
                    error: function() {
                        alert('Failed to load subscriptions.');
                    }
                });
            }
            loadCategories();

            $(document).on('click', '.edit', function() {
                var categoryId = $(this).data('id'); // Get the category ID from the button's data attribute

                // Make an AJAX request to fetch category data
                $.ajax({
                    url: "{{ route('categories.edit', ':id') }}".replace(':id', categoryId),
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            // Populate the modal form with the fetched data
                            $('#editCategoryId').val(response.data.id);
                            $('#update_category_name').val(response.data.name);

                            // Show the modal
                            $('#categoryedit').modal('show');
                        } else {
                            alert('Category not found.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to load category details:', error);
                        alert('Failed to load category details.');
                    }
                });
            });


            $('#categoriesTable').on('click', '.delete', function() {
                const id = $(this).data('id');
                if (confirm('Are you sure you want to delete this category?')) {
                    $.ajax({
                        url: "{{ route('categories.destroy', ':id') }}".replace(':id', id), // Use route() helper to build URL
                        method: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}" // Include CSRF token
                        },
                        success: function(response) {
                            loadCategories();
                        },
                        error: function(xhr) {
                            if (xhr.status === 404) {
                                alert('Category not found.');
                            } else {
                                alert('An error occurred while deleting the category.');
                            }
                        }
                    });
                }
            });
            // Update Category Form Submission
            $('#update_categorysubmit').on('click', function(event) {
                event.preventDefault(); // Prevent the default form submission

                var categoryId = $('#editCategoryId').val(); // Get the category ID from the hidden input
                var categoryName = $('#update_category_name').val(); // Get the updated category name

                // Make an AJAX request to update the category
                $.ajax({
                    url: "{{ route('categories.update', ':id') }}".replace(':id', categoryId),
                    method: 'PUT',
                    data: {
                        category_name: categoryName,
                        _token: "{{ csrf_token() }}"
                    },
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
