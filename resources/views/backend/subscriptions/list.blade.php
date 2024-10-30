@extends('backend/partials/header')
@section('content')
    <section class="dashboard_secs acc_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                   <div class="d-flex justify-content-between align-items-baseline">
                       <div class="head_title d-flex">
                           <img src="{{asset('backend/assets/img/square.png')}}" alt="">
                           <h3>All Subscription</h3>
                          
                       </div>
                       <div class="btn_div">
                           <a href="{{route('subscription.create')}}" class="gradient_btn d-block">Create Subscription</a>
                       </div>
                   </div>
                </div>

                <div class="col-md-12 ">
                    <div class="black_sec">
                        <div class="head_title">
                            <!-- <h3>Add Details</h3> -->
                            <div class="pricing_form">
                                <table class="table table-borderless card-header-tabs" id="subscriptionTable">
                                    <thead>
                                    <tr>
                                        <th>S#no</th>
                                        <th> Name</th>
                                        <th>Feature</th>
                                        <th>Price</th>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
    <script>
        $(document).ready(function() {
            
function loadSubscriptions() {
    $.ajax({
        url: "{{ route('subscriptions.index') }}",
        method: "GET",
        success: function(data) {
            let rows = '';
            if (data.length === 0) {
                rows = '<tr><td colspan="5" style="text-align: center;">No subscriptions available.</td></tr>';
            } else {
                $.each(data, function(index, subscription) {
                    rows += '<tr>';
                    rows += '<td>' + (index + 1) + '</td>';
                    rows += '<td>' + subscription.name + '</td>';
                    rows += '<td>' + subscription.features.join(', ') + '</td>';
                    rows += '<td>$' + subscription.price + '</td>';
                    rows += '<td>';
                    rows += '<a href="javascript:;" class="edit" data-id="' + subscription.id + '"><i class="fa-solid fa-pencil"></i></a>';
                    rows += '<a href="javascript:;" class="delete" data-id="' + subscription.id + '"><i class="fa-solid fa-trash"></i></a>';
                    rows += '</td>';
                    rows += '</tr>';
                });
            }
            $('#subscriptionTable tbody').html(rows);
        },
        error: function() {
            alert('Failed to load subscriptions.');
        }
    });
}

// Load subscriptions when the page is ready
loadSubscriptions();
            
            
    //           $('#subscriptionTable').on('click', '.edit', function() {
    //     const id = $(this).data('id');
    //     window.location.href = "{{ url('prices') }}/" + id + "/edit";
    // });
            
    $('#subscriptionTable').on('click', '.edit', function() {
                const id = $(this).data('id');
                if (id) {
                    const editUrl = "{{ route('edit.pricing', ':id') }}".replace(':id', encodeURIComponent(id));
                    window.location.href = editUrl;
                } else {
                    console.error('No ID found for the subscription.');
                }
            });

            
            
               // Delete subscription
    $('#subscriptionTable').on('click', '.delete', function() {
        const id = $(this).data('id');
        if (confirm('Are you sure you want to delete this subscription?')) {
            $.ajax({
                url: "{{ url('prices') }}/" + id,
                method: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    alert('Pricing deleted successfully.');
                    loadSubscriptions(); // Reload the table
                },
                error: function(xhr) {
                    if (xhr.status === 404) {
                        alert('Pricing not found.');
                    } else {
                        alert('An error occurred while deleting the pricing.');
                    }
                }
            });
        }
    });
        });
    </script>
@endsection
