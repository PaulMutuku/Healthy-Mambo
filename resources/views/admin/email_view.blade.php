<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
                        <label for="">Greeting</label>
                        <input type="text" style="color:black;" name="greeting" placeholder="Write Doctor's Name" required="">
        
                    </div>
                    <div style="padding:15px;">
                        <label for="">Body</label>
                        <input type="text" style="color:black;" name="body" required="">
        
                    </div>
                    
                    <div style="padding:15px;">
                        <label for="">Action text</label>
                        <input type="text" style="color:black;" name="actiontext" placeholder="Write Doctor's Room Number" required="">
        
                    </div>
                    <div style="padding:15px;">
                        <label for="">Action url</label>
                        <input type="text" style="color:black;" name="actionurl" placeholder="Write Doctor's Room Number" required="">
        
                    </div>
                    <div style="padding:15px;">
                        <label for="">End part</label>
                        <input type="text" style="color:black;" name="endpart" placeholder="Write Doctor's Room Number" required="">
        
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