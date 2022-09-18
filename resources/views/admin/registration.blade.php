@extends('layout.dashboard-layout')

@section('content')
<h2 class="h2 mb-1">List of Residence Registration </h2>
<div class="card shadow">
    <div class="card-body">
      <div class="toolbar">
        <form class="form">
          <div class="form-row">
            <div action="/residents" class="form-group col-auto">
              <label for="search" class="sr-only">Search</label>
              <input type="text" class="form-control" id="search" name="search" value="" placeholder="Search">     
            </div>
          </div>
        </form>
      </div>
      <!-- table -->
      <table class="table table-borderless table-hover">
        <thead>
          <tr>
          
            <th>Image</th>
            <th>Name</th>
            <th>Nickname</th>
            <th>Birthdate</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Actions</th>
          </tr>
        </thead>

        @foreach($reg as $registration)
        <tbody>
          <tr>
            <td>
              <div class="image-round">
                <img class="imagePreview" src="{{$registration->profile_image ? asset ('storage/' .$registration->profile_image) : asset('/storage/images/-image.png')}}" alt=""  />
              </div>
            </td>
            <td class="show" >{{$registration->first_name}}  {{$registration->last_name}}</td>
           
            <td class="show" >{{$registration->nickname}}</td>
            <td class="show">{{$registration->birthdate}}</td>
            <td class="show" >{{$registration->age}}</td>
            <td class="show">{{$registration->gender}}</td>
            <td>
                
                <a class="btn btn-danger" href="{{url('viewRegistration',$registration->id)}}">View</a>
              
            </td>
          </tr>

           <!---------------------------------------- SHOW Residents Modal HTML -------------------------------------->
        

            <!---------------------------------------- Delete Residents Modal HTML -------------------------------------->
          
<!--------------------------------- Edit Residents Modal HTML ------------------------------------------>

          @endforeach
        </tbody>

      </table>
    

    </div>
  </div>
@endsection