@extends('backend/partials/header')
@section('content')
    <section class="dashboard_secs acc_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="head_title d-flex">
                        <img src="{{asset('backend/assets/img/square.png')}}" alt="">
                        <h3>Dashboard</h3>
                    </div>
                </div>
                <div class="col-md-4 black_sec">

                    <div class="dollar d-flex">
                        <img src="{{asset('backend/assets/img/dollar.png')}}">
                        <div class="box">
                            <span class="short-tit">Subscription 1</span>
                            <h3 class="dollr-head">$152K</h3>
                        </div>
                        <div class="perc-box box-red d-flex">
                            <i class="fas fa-arrow-down"></i>
                            <span class="count">25%</span>
                        </div>
                    </div>
                    <div class="dollar d-flex">
                        <img src="{{asset('backend/assets/img/dollar.png')}}">
                        <div class="box">
                            <span class="short-tit">Subscription 2</span>
                            <h3 class="dollr-head">$152K</h3>
                        </div>
                        <div class="perc-box box-green d-flex">
                            <i class="fas fa-arrow-up"></i>
                            <span class="count">25%</span>
                        </div>
                    </div>
                    <div class="dollar d-flex">
                        <img src="{{asset('backend/assets/img/cube.png')}}">
                        <div class="box">
                            <span class="short-tit">New Signup</span>
                            <h3 class="dollr-head">2,140</h3>
                        </div>
                        <div class="perc-box box-red d-flex">
                            <i class="fas fa-arrow-down"></i>
                            <span class="count">25%</span>
                        </div>
                    </div>
                    <div class="dollar d-flex">
                        <img src="{{asset('backend/assets/img/feather-clock.png')}}">
                        <div class="box">
                            <span class="short-tit">Data label</span>
                            <h3 class="dollr-head">140</h3>
                        </div>
                        <div class="perc-box box-green d-flex">
                            <i class="fas fa-arrow-down"></i>
                            <span class="count">25%</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 ">
                    <div class="black_sec">
                        <div class="head_title">
                            <h3>Statistics</h3>
                            <div class="graph-box">
                                <div>
                                    <canvas id="myChart" style="height: 600px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="high-chart dashboard_secs">
        <div class="container-fluid">
            <div class="row black_sec">
                <div class="col-md-12 black_sec">
                    <div class="head_title">
                        <h3>Monthly Active Users</h3>
                    </div>
                    <div class="chart-box">
                        <div id="user-role-chart" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
    <script src="https://code.angularjs.org/1.2.21/angular.js"></script>
    <script src="https://code.highcharts.com/highcharts.src.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('get_users_by_role') }}", // Route to get data
                method: 'GET',
                success: function(response) {
                    console.log(response); // Debug response
                    var contentCreatorData = response.content_creator.map(function(item) {
                        return [item[0], item[1]];
                    });
                    var generalUserData = response.general_user.map(function(item) {
                        return [item[0], item[1]];
                    });

                    console.log('Content Creator Data:', contentCreatorData);
                    console.log('General User Data:', generalUserData);

                    // Create the Highcharts graph
                    Highcharts.chart('user-role-chart', {
                        chart: {
                            type: 'line',
                            backgroundColor: '#000000'
                        },
                        title: {
                            text: 'Monthly User Registrations by Role',
                            style: {
                                color: '#FFFFFF'
                            }
                        },
                        xAxis: {
                            categories: [...new Set(contentCreatorData.concat(generalUserData).map(item => item[0]))],
                            title: {
                                text: 'Month',
                                style: {
                                    color: '#FFFFFF'
                                }
                            },
                            labels: {
                                style: {
                                    color: '#FFFFFF'
                                }
                            }
                        },
                        yAxis: {
                            title: {
                                text: 'Number of Registrations',
                                style: {
                                    color: '#FFFFFF'
                                }
                            },
                            labels: {
                                style: {
                                    color: '#FFFFFF'
                                }
                            },
                            gridLineColor: '#444444'
                        },
                        tooltip: {
                            formatter: function() {
                                return '<b>' + this.x + '</b><br/>' +
                                    this.series.name + ': ' + this.y;
                            },
                            backgroundColor: '#000000',
                            style: {
                                color: '#FFFFFF'
                            }
                        },
                        series: [{
                            name: 'Content Creator',
                            data: contentCreatorData
                        }, {
                            name: 'General User',
                            data: generalUserData
                        }]
                    });
                }
            });
        });

    </script>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Category 1", "Category 2", "Category 3", "Category 4", "Category 5"],
                datasets: [{
                    label: 'blue',
                    data: [12, 19, 3, 17, 28],
                    backgroundColor: "#132E9A"
                }, {
                    label: 'creme',
                    data: [100, 29, 5, 5, 20],
                    backgroundColor: "#B7B7B7"
                },
                    {
                        label: 'purple',
                        data: [100, 29, 5, 5, 20],
                        backgroundColor: "#873DC8"
                    }]
            }
        });
    </script>
    <script>
        function generatePriceData() {
            return Array.from({ length: 10 }, (_, i) => ({
                name: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'][i],
                y: (Math.random() * 100000).toFixed(2) // Random price between 0 and 1000
            }));
        }

        var data1 = generatePriceData();
        var data2 = generatePriceData();

            // var chart = new Highcharts.Chart({
            //     chart: {
            //         renderTo: 'chart',
            //         type: 'line',
            //         marginBottom: 80,
            //         backgroundColor: '#000000' // Set background color to black
            //     },
            //     xAxis: {
            //         categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            //         labels: {
            //             rotation: 90,
            //             style: {
            //                 color: '#FFFFFF' // Set x-axis labels color to white
            //             }
            //         }
            //     },
            //     yAxis: {
            //         title: {
            //             text: 'Value',
            //             style: {
            //                 color: '#FFFFFF' // Set y-axis title color to white
            //             }
            //         },
            //         labels: {
            //             style: {
            //                 color: '#FFFFFF' // Set y-axis labels color to white
            //             }
            //         },
            //         gridLineColor: '#444444' // Optional: Change grid line color to a lighter shade for better visibility
            //     },
            //     tooltip: {
            //         formatter: function() {
            //             var label = this.series.name === 'This year' ? 'This year' : 'Last year';
            //             return '<b>' + this.x + '</b><br/>' +
            //                 label + ': $' + Highcharts.numberFormat(this.y, 2); // Format tooltip value as currency
            //         },
            //         backgroundColor: '#000000', // Set tooltip background color to black
            //         style: {
            //             color: '#FFFFFF' // Set tooltip text color to white
            //         }
            //     },
            //     series: [{
            //         name: 'This year',
            //         data: data1.map(point => parseFloat(point.y))  // Convert y values to numbers
            //     }, {
            //         name: 'Last year',
            //         data: data2.map(point => parseFloat(point.y))  // Convert y values to numbers
            //     }]
            // });
    </script>

@endsection
