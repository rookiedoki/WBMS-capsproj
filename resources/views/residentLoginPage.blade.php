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
    <link rel="stylesheet" href="{{url('assets/css/app-dark.css')}}" id="darkTheme" >
    <link rel="stylesheet" href="{{url('assets/css/mystyle.css')}}">
    {{-- <link rel="stylesheet" href="{{URL::asset('css/mystyle.css')}}"> --}}
  </head>
  <body class="dark scroll">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">

        <form method="POST" action="/residentLogin/auth" class="col-lg-4 col-md-4 col-10 mx-auto text-center">
          <h1 class="h1 mb-3">Welcome Resident</h1>
          @csrf
          @if(session()->has('fail'))
          <div class="alert" id="alert">
          <button type="button" class="close" data-dismiss="alert">x</button>
          {{session()->get('fail')}}

        </div>
        @endif
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="/">
            @foreach($setting as $settings)
            <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}" class="img-fluid" width="100" style="padding-bottom: 15%">       
            @endforeach
          </a>
          <h1 class="h4 mb-3">Sign in</h1>
          <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email address"  value="{{old('email')}}">
          
            @Error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
          </div>
          <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password"  value="{{old('password')}}">
            @Error('password')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
          <p class="mt-2 mb-3">Don't have an account? <a href="/register">Register</p></a>
          <p class="mt-5 mb-3 text-muted">© 2020</p>
        </form>
      </div>
    </div>
    
  </body>
</html>
</body>
</html>