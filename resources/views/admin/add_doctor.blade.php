<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
        label
        {
            display: inline-block;
            width: 200px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            
            <div class="container" align="center" style = "padding-top: 100px;">
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    x
                </button>
                {{session()->get('message')}}
            </div>
            @endif
                <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding:15px;">
                        <label for="">Doctor Name</label>
                        <input type="text" style="color:black;" name="name" placeholder="Write Doctor's Name" required="">
        
                    </div>
                    <div style="padding:15px;">
                        <label for="">Phone</label>
                        <input type="Number" style="color:black;" name="number" placeholder="Write Doctor's Number" required="">
        
                    </div>
                    <div style="padding:15px;">
                        <label for="">Doctor Speciality</label>
                        <select name="speciality" style="color:black; width:200px;" required="">
                            <option value="">--Select--</option>
                            <option value="Heart">Heart</option>
                            <option value="Optician">Optician</option>
                            <option value="Oncologist">Oncologist</option>
                            <option value="Dentist">Dentist</option>
                        </select>        
                    </div>
                    <div style="padding:15px;">
                        <label for="">Doctor Room Number</label>
                        <input type="text" style="color:black;" name="room" placeholder="Write Doctor's Room Number" required="">
        
                    </div>
                    <div style="padding:15px;">
                        <label for="">Doctor image</label>
                        <input type="file"  name="file" required="">
        
                    </div>
                    <div style="padding:15px;">                     
    
                        <input type="submit" class="btn btn-success">
        
                    </div>
                </form>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>