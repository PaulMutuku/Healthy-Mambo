<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!--<meta name="copyright" content="MACode ID, https://macodeid.com/">-->

  <title>Healthy Mambo</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
  <style>
        label
        {
            display: inline-block;
            width: 200px;
        }
    </style>
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> 0712345678</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><span class="text-primary">Healthy</span>-Mambo</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.html">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.html">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>

            @if(Route::has('login'))

            @auth

            
            <x-app-layout>
    
            </x-app-layout>

            @else

            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login 
                
              </a>
            </li>

            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">Register 
                
              </a>
            </li>
            @endauth
            @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>
            <div class="container-fluid page-body-wrapper">
                
                <div class="container" align="center" style="padding:100px">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                            x
                        </button>
                        {{session()->get('message')}}
                    </div>
                    @endif
                    <form action="{{url('editappointment',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div style="padding:15px;">
                            <label for=""> Name</label>
                            <input type="text" style="color:black" name="name" value="{{$data->name}}">
                            
                        </div>
                        <div style="padding:15px;">
                            <label for="">email</label>
                            <input type="text" style="color:black" name="email" value="{{$data->email}}">
                        </div>
                        <div style="padding:15px;">
                            <label for="">Phone</label>
                            <input type="number" style="color:black" name="phone" value="{{$data->Phone}}">
                        </div>
                        
                        <div style="padding:15px;">
                            <label for="">date</label>
                            <input type="date" name="date" class="col-12 col-sm-6 py-2 wow fadeInRight">
                        </div>
                        <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                          <label for="">Doctor's Name</label>
                            <select name="doctor" id="departement" class="custom-select">
                            <option value="">-- select doctor --</option>
                            @foreach($data as $doctors)
                              <option value="{{$doctors->name}}">{{$doctors->name}} --speciality-- {{$doctors->speciality}}</option>
                            @endforeach                        
                        </div>
                        
                        <div style="padding:15px; margin-top:10px;" class="col-12 col-sm-6 py-2 wow fadeInRight">
                            <label>Message</label>
                            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
                        </div>
                        <div style="padding:15px;">
                            <input type="submit" class="btn btn-success">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>