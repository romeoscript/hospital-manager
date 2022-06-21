<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css');
    <style>
        label {
            display: inline-block;
            width: 200px;
            text-transform: uppercase;
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
                @if (session()->has('message'))
                <div class="alert alert-success">
                  <button class="close" data-dismiss="alert">x</button>
                  {{session()->get('message')}}
                </div>
                    
                @endif
                <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding:20px;">
                        <label for="doctor">Doctor Name</label>
                        <input type="text" placeholder="input the name " style="color: black;" name="name" required>
                    </div>
                    <div style="padding:20px;">
                        <label for="number">Phone</label>
                        <input type="number" placeholder="input phone" style="color: black;" name="number" required>
                    </div>
                    <div style="padding:20px;">
                        <label for="specialty">specialty</label>
                        <select name="specialty" id="" style="color: black;width:200px;" required>
                            <option value="">--select--</option>
                            <option value="skin">skin</option>
                            <option value="heart">heart</option>
                            <option value="eye">eye</option>
                            <option value="nose">nose</option>
                        </select>
                    </div>
                    <div style="padding:20px;">
                        <label for="ROOM">ROOM NO.</label>
                        <input type="number" placeholder="input room number" style="color: black;" name="room" required>
                    </div>
                    <div style="padding:20px;">
                        <label for="image">image</label>
                        <input type="file" name="file" id="" required>
                    </div>
                    <div style="padding:20px;">

                        <input type="submit" name="file" class="btn btn-success">
                    </div>
                </form>
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
