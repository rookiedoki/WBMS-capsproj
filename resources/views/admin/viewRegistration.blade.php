@extends('layout.dashboard-layout')

@section('content')

    <div class="row align-items-center h-100">
      <form  method="POST" enctype="multipart/form-data"  action="/registration" class="col-lg-8 col-md-8 col-10 mx-auto"  >
        @csrf

        
        <div class="mx-auto text-center my-4">
          @foreach($setting as $settings)
          <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}" alt="" style="width: 25%"/>		
          @endforeach
          <h1 class="my-3">Residence Registration Profile</h1>
        </div>
        
      <div class="form-row">
        <div class="form-group col-sm-4">
          <label>First Name</label>
          <input type="text" name="first_name" class="form-control" value="{{$reg->first_name}}">
          @Error('first_name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
         @enderror
        </div>

        <div class="form-group col-sm-4">
          <label>Middle Name</label>
          <input type="text"  name="middle_name" class="form-control" value="{{$reg->middle_name}}">
          @Error('middle_name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
         @enderror
        </div>

        <div class="form-group col-sm-4">
          <label>Last Name</label>
          <input type="text"  name="last_name" class="form-control" value="{{$reg->last_name}}">
          @Error('last_name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
         @enderror
        </div>

     </div>

     <div class="form-row">
      <div class="form-group col-sm-4">
        <label>Nickname</label>
        <input type="text"  name="nickname" class="form-control" value="{{$reg->nickname}}">
        @Error('nickname')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
         @enderror
      </div>

      <div class="form-group col-sm-4">
        <label>Place of Birth</label>
        <input type="text" name="place_of_birth" class="form-control" value="{{$reg->place_of_birth}}">
        @Error('place_of_birth')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
         @enderror
      </div>

      <div class="form-group col-sm-4">
        <label>Birthdate</label>
        <input type="date" name="birthdate" class="form-control" value="{{$reg->birthdate}}">
        @Error('birthdate')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
         @enderror
      </div>

   </div>

   <div class="form-row">
    <div class="form-group col-sm-4">
      <label>Age</label>
      <input type="text" name="age" class="form-control" value="{{$reg->age}}">
      @Error('age')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="form-group col-sm-4">
      <label>Civil Status</label>
      <input type="text"  name="civil_status" class="form-control" value="{{$reg->civil_status}}"> 
      @Error('civil_status')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
         @enderror
    </div>

    <div class="form-group col-sm-4">
      <label>Gender</label>
      <select class="form-control" name="gender" value="{{$reg->gender}}" required autocomplete="gender" >
        <option value="Male"{{$reg->gender=="Male" ? 'selected' :''}}>Male</option>
        <option value="Female"{{$reg->gender=="Female" ? 'selected' :''}}>Female</option>
    </select>
    @Error('gender')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
         @enderror
    </div>

 </div>
 
 <div class="form-row">
  <div class="form-group col-sm-4">
    <label>Street</label>
    <input type="text"  name="street" class="form-control" value="{{$reg->street}}">
    @Error('street')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
         @enderror
  </div>

  <div class="form-group col-sm-4">
    <label>Voter Status</label>
    <select class="form-control" name="voter_status" value="{{$reg->voter_status}}" required autocomplete="voter_status" >
        <option value="Voter"{{$reg->voter_status=="Voter" ? 'selected' :''}}>Voter</option>
        <option value="Non Voter"{{$reg->voter_status=="Non Voter" ? 'selected' :''}}>Non Voter</option>
  </select>
  @Error('voter_status')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
         @enderror
  </div>

  <div class="form-group col-sm-4">
    <label>Citizenship</label>
    <input type="text"  name="citizenship" class="form-control" value="{{$reg->citizenship}}">
    @Error('citizenship')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
         @enderror
  </div>

 </div>
 <div class="form-row">

  <div class="form-group col-sm-6">
    <label>Contact Number</label>
    <input type="text"  name="phone_number" class="form-control" value="{{$reg->phone_number}}">
    @Error('contact_number')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
         @enderror
  </div>

  <div class="form-group col-sm-6">
    <label>Occupation</label>
    <input type="text" id="occupation"  name="occupation" class="form-control" value="{{$reg->occupation}}">
    @Error('occupation')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
         @enderror

  </div>
 </div>
  <div class="form-row">
    <div class="form-group col-sm-6">
      <label>Email Address</label>
      <input type="text" name="email" class="form-control" value="{{$reg->email}}">
      @Error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
    </div>
  <div class="form-group col-sm-6">
    <label>Password</label>
    <input type="password"  name="password" class="form-control" value="{{$reg->password}}">
    @Error('password')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
         @enderror
  </div>

 </div>
        <hr class="my-4">
        <div class="row mb-4">
          <div class="col-md-6">
            <div class="form-group">
              <label >Profile Image</label>
              <a href="#showImageProfile" class="show" data-toggle="modal"><img class="img-view"src="{{$reg->profile_image ? asset ('storage/' .$reg->profile_image) : asset('/storage/images/-image.png')}}" alt=""  /></a>
              <input type="hidden" name="oldprofile_image" value="{{$reg->profile_image}}">
              @Error('profile_image')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label >ID or Birth Certicate</label>
              <a href="#showImageID" class="show" data-toggle="modal"><img class="img-view"src="{{$reg->image_id_birth ? asset ('storage/' .$reg->image_id_birth) : asset('/storage/images/-image.png')}}" alt=""  /></a>
              <input type="hidden" name="oldimage_id_birth" value="{{$reg->image_id_birth}}">
              @Error('image_id_birth')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
            </div>
          </div>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Accept</button>
        <p class="mt-5 mb-3 text-muted text-center">© 2020</p>
      </form>
    </div>
{{-- -----------------------------------view image profile---------------------------- --}}
    <div id="showImageProfile" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <form>
                  <div class="modal-header">						
                      <h4 class="modal-title">View Profile Picture</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>


                  <div class="modal-body">					
                    <div id="image-show-area">
                      <img class="id-birth" src="{{$reg->profile_image ? asset ('storage/' .$reg->profile_image) : asset('/storage/images/-image.png')}}" alt=""  />
                    </div>
                  </div>
                  <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                  </div>

              </form>
          </div>
      </div>
  </div>

  {{-- -----------------------------------view image id or birthcertificate---------------------------- --}}
  <div id="showImageID" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">						
                    <h4 class="modal-title">View ID or Birth Certicate</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>


                <div class="modal-body">					
                  <div id="image-show-area">
                    <img class="id-birth" src="{{$reg->image_id_birth ? asset ('storage/' .$reg->image_id_birth) : asset('/storage/images/-image.png')}}" alt=""  />
                  </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                </div>

            </form>
        </div>
    </div>
</div>

  <script src="{{url('assets/js/jquery.min.js')}}"></script>
  <script src="{{url('assets/js/popper.min.js')}}"></script>
  <script src="{{url('assets/js/moment.min.js')}}"></script>
  {{-- <script src="{{url('assets/js/bootstrap.min.js')}}"></script> --}}
  <script src="{{url('assets/js/simplebar.min.js')}}"></script>
  <script src='{{url('assets/js/daterangepicker.js')}}'></script>
  <script src='{{url('assets/js/jquery.stickOnScroll.js')}}'></script>
  <script src="{{url('assets/js/tinycolor-min.js')}}"></script>
  <script src="{{url('assets/js/config.js')}}"></script>
  <script src="{{url('assets/js/apps.js')}}"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag()
    {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
  </script>
  
  <script type="text/javascript">
  
  $("document").ready(function()

  {
    setTimeout(function()
      {
        $("div.alert").remove();
      },3000);
  });
  
  </script>

@endsection