@extends('layout.dashboard-layout')

@section('content')
<h1>Customize Website</h1>

<link rel="stylesheet" href="{{url('assets/css/settings.css')}}">

<!------ Include the above in your HEAD tag ---------->



<div class="container emp-profile">
    @foreach($setting as $settings)
            <form action="/settings/{{$settings->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}" alt="" id="prview"/>
                            <div class="file btn btn-lg btn-primary">
                                Change Logo
                                <input type="file" name="barangay_logo" id="barangay_logo" value="{{$settings->settings_image}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <input type="text" class="form-settings" name="barangay_name" value="{{$settings->barangay_name}}" required autocomplete="barangay_name">
                                    <h6>
                                        Name of the Barangay
                                    </h6>
                                   
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Save"/>
                    </div>
                </div>
               
            </form>    
            @endforeach       
        </div>

        <script>
            barangay_logo.onchange = evt => {
              const [file] = barangay_logo.files
              if (file) {
                prview.style.visibility = 'visible';
            
                prview.src = URL.createObjectURL(file)
              }
            }
        </script>
        
@endsection