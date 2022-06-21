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
                           
                            <th>Doctor Name</th>
                            <th>Phone</th>
                            <th>Specialty</th>
                            <th>Room no</th>
                            <th>Image</th>
                            <th>delete</th>
                            <th>update</th>

                        </tr>
                       @foreach ($data as $doctor)
                           
                     
                        <tr>
                            <td>{{$doctor->name}}</td>
                            <td>{{$doctor->phone}}</td>
                            <td>{{$doctor->specialty}}</td>
                            <td>{{$doctor->room}}</td>
                            <td><img width="100" height="100" src="doctorimage/{{$doctor->image}}" alt=""></td>
                            <td>
                                <a class="btn btn-danger" href="{{url('delete',$doctor->id)}}">delete</a>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{url('update',$doctor->id)}}">update</a>
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
