<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css');
    <style>
        .table{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 50px;
            padding: 20px
        }
        table{
            width: 70%
        }
        .bt{
            background-color: red;
            padding: 5px 25px;
            color: white;
            border-radius: 10px;
        }
      </style>

</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and
                                more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar');
        <!-- partial -->
        @include('admin.navbar');
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <div class="container" style="padding-top:100px;text-align:center;">
                <div class="table">
                    <table>
                        <tr>
                            <th>Patient Name</th>
                            <th>Doctor Name</th>
                            <th>Date</th>
                            <th>Message</th>
                            <th>status</th>
                            <th>Approved</th>
                            <th>Canceled</th>

                        </tr>
                       @foreach ($appoint as $appoints)
                           
                     
                        <tr>
                            <td>{{$appoints->name}}</td>
                            <td>{{$appoints->doctor}}</td>
                            <td>{{$appoints->date}}</td>
                            <td>{{$appoints->message}}</td>
                            <td>{{$appoints->status}}</td>
                            <td>
                                <a class="btn btn-success" href="{{url('approve',$appoints->id)}}">approve</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{url('canceled',$appoints->id)}}">cancel</a>
                            </td>
                           
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    @include('admin.script');
</body>

</html>
