<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{url('assets/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{url('assets/css/feather.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{url('assets/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{url('assets/css/app-light.css')}}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{url('assets/css/app-dark.css')}}" id="darkTheme">
  </head>
  <body class="dark ">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">

        <form class="col-lg-4 col-md-4 col-10 mx-auto text-center">
          @foreach($setting as $settings)
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="/">
            <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}" style="width: 50%">
          </a>
          <h1 class="h2 mb-3">{{$settings->barangay_name}}</h1>
          @endforeach
          <a href="/adminLoginPage" class="btn btn-lg btn-primary btn-block">Administrator</a>
          <a href="/residentLoginPage" class="btn btn-lg btn-primary btn-block">Residents</a>
        </form>
    
  </body>
</html>
</body>
</html>