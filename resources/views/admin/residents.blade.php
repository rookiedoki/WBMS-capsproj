@extends('layout.dashboard-layout')

@section('content')

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
      <h2 class="h4 mb-1">Manage Residence</h2>
        {{-- <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa print"></i></a> --}}
      <div class="card shadow">
        <div class="card-body">
          <div class="toolbar">
            <form class="form">
              <div class="form-row">
                <div class="form-group col-auto mr-auto">
                  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addResidentsModal"><i class="material-icons">&#xE147;</i>&nbsp;&nbsp;&nbsp;Add New Residents</a>
                </div>
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
                <td>
                </td>
                <th>Image</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Nickname</th>
                <th>Phone</th>
                <th colspan="3">Actions</th>
              </tr>
            </thead>

            @foreach($resident as $residents)
            <tbody>
              <tr>
                <td>
                </td>
                <td>
                  <div class="image-round">
                    <img class="imagePreview" src="{{$residents->resident_image ? asset ('storage/' .$residents->resident_image) : asset('/storage/images/-image.png')}}" alt=""  />
                  </div>
                </td>
                <td href="#showResidentsModal{{$residents->id}}" class="show" data-toggle="modal">{{$residents->first_name}}</td>
               
                <td href="#showResidentsModal{{$residents->id}}" class="show" data-toggle="modal">{{$residents->middle_name}}</td>
                <td href="#showResidentsModal{{$residents->id}}" class="show" data-toggle="modal">{{$residents->last_name}}</td>
                <td href="#showResidentsModal{{$residents->id}}" class="show" data-toggle="modal">{{$residents->nickname}}</td>
                <td href="#showResidentsModal{{$residents->id}}" class="show" data-toggle="modal">{{$residents->phone_number}}</td>
                <td>
                    <a href="#editResidentsModal{{$residents->id}}" class="edit" data-toggle="modal" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#deleteResidentsModal{{$residents->id}}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    <a href="{{url('viewResidents',$residents->id)}}" ><i class="fas fa-eye fa-minimize" ></i></a>
                    {{-- <a class="btn btn-danger" href="{{url('viewResidents',$residents->id)}}">View</a> --}}
                </td>
              </tr>

               <!---------------------------------------- SHOW Residents Modal HTML -------------------------------------->
               <div id="showResidentsModal{{$residents->id}}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">						
                                <h4 class="modal-title">View Residents</h4>
                                {{-- <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa print"></i></a> --}}
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">	
                                <div class="page-content page-container" id="page-content">
                                    <div class="padding">
                                        <div class="row container d-flex justify-content-center">
                                <div class="col-xl-12 col-md-12">
                                <div class="card user-card-full">
                                    <div class="row m-l-0 m-r-0">
                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                            <div class="card-block text-center text-white">
                                                <div class="m-b-25">
                                                    <img class="img-radius" id="preview" src="{{$residents->resident_image ? asset ('storage/' .$residents->resident_image) : asset('/storage/no/-image.png')}}" alt="" />
                                                </div>
                                                <h4 class="f-w-600">{{$residents->first_name}} {{$residents->last_name}}</h4>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card-block">
                                                <h5 class="textTitle b-b-default">Information</h5>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">First name: {{$residents->first_name}}</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Middle Name: {{$residents->middle_name}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Last Name: {{$residents->last_name}}</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Age: {{$residents->age}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Gender: {{$residents->gender}}</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Birthdate {{$residents->birthdate}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Citizenship: {{$residents->citizenship}}</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Voter Status: {{$residents->voter_status}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Civil Status: {{$residents->civil_status}}</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Occupation: {{$residents->occupation}}</p>
                                                    </div>
                                                </div>
                                                <h5 class="textTitle b-b-default">Contact Information</h5>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Phone Number</p>
                                                        <h6 class="text-muted f-w-400">{{$residents->phone_number}}</h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Email Address</p>
                                                        <h6 class="text-muted f-w-400">{{$residents->email}}</h6>
                                                    </div>
                                                </div>
                                                
                                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Back">
                            </div>
        
                        </form>
                    </div>
                </div>
            </div>

                <!---------------------------------------- Delete Residents Modal HTML -------------------------------------->
                <div id="deleteResidentsModal{{$residents->id}}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form>
                                <div class="modal-header">						
                                    <h4 class="modal-title">Delete Residents</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
            
            
                                <div class="modal-body">					
                                    <p>Are you sure you want to delete these Records?</p>
                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    {{-- <input type="submit" href="{{url('deleteResidents', $residents->id)}}" class="btn btn-danger" value="Delete"> --}}
                                    <a class="btn btn-danger" href="{{url('deleteResidents',$residents->id)}}">Delete</a>
                                </div>
            
                            </form>
                        </div>
                    </div>
                </div>
<!--------------------------------- Edit Residents Modal HTML ------------------------------------------>


<div id="editResidentsModal{{$residents->id}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="/residents/{{$residents->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

                <div class="modal-header">						
                    <h4 class="modal-title">Edit Residents</h4>
                    
             
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="row register-form">
             
                        <div class="modal-body">
                            <div class="form-group">
                            <label class="labelImage">Image</label>
                            <img class="preview" id="preview" src="{{$residents->resident_image ? asset ('storage/' .$residents->resident_image) : asset('/storage/no/-image.png')}}" alt="" />
                            <input type="file"  name="resident_image" id="resident_image2" value="{{$residents->resident_image}}" >
                          
                         </div>
                        
                        
                         @Error('resident_image')
                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                    
                        </div>
                    </div>
                
            <div class="row register-form">
                <div class="col-sm-4">
                    <div class="modal-body">					
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{$residents->first_name}}" required autocomplete="first_name">
                        
                            @Error('first_name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" value="{{$residents->middle_name}}" required autocomplete="middle_name">
                    </div>

                    @Error('middle_name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror

                    </div>
                </div>
            

            <div class="col-sm-4">
                <div class="form-group">
                    <div class="modal-body">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{$residents->last_name}}" required autocomplete="last_name">
                </div>

                @Error('last_name')
                     <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                </div>
            </div>
        </div>

            

         <div class="row register-form">
                <div class="col-sm-4">
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Nickname</label>
                        <input type="text" class="form-control" name="nickname" value="{{$residents->nickname}}" required autocomplete="nickname">
                     </div>

                     @Error('nickname')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror

                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Place of Birth</label>
                        <input type="text" class="form-control" name="place_of_birth" value="{{$residents->place_of_birth}}" required autocomplete="place_of_birth">
                    </div>	
                    
                    @Error('place_of_birth')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror
                    
                    </div>			
                </div>

                
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Birthdate</label>
                        <input type="date" class="form-control" name="birthdate" value="{{$residents->birthdate}}" required autocomplete="birthdate">
                    </div>	
                    
                    @Error('birthdate')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror

                    </div>			
                </div>

            </div>

            <div class="row register-form">
                <div class="col-sm-4">
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" name="age" value="{{$residents->age}}" required autocomplete="age">
                     </div>

                     @Error('age')
                     <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror

                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Civil Status</label>
                        <input type="text" class="form-control" name="civil_status" value="{{$residents->civil_status}}" required autocomplete="civil_status">
                    </div>	
                    
                    @Error('civil_status')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror

                    </div>			
                </div>

                
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Gender</label>
                        <select class="form-control" id="gender"name="gender" required autocomplete="gender">
                           
                          
                            <option value="Male"{{$residents->gender=="Male" ? 'selected' :''}}>Male</option>
                            <option value="Female"{{$residents->gender=="Female" ? 'selected' :''}}>Female</option>
                        </select>
                    </div>
                    
                    @Error('gender')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror

                    </div>			
                </div>

            </div>

            <div class="row register-form">
                <div class="col-sm-4">
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Street</label>
                        <input type="text" class="form-control" name="street" value="{{$residents->street}}" required autocomplete="street">
                     </div>

                     @Error('street')
                     <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror

                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Voter Status</label>
                        <select class="form-control" id="voter_status"name="voter_status" required autocomplete="voter_status">
                           
                          
                            <option value="Voter"{{$residents->voter_status=="Voter" ? 'selected' :''}}>Voter</option>
                            <option value="Non Voter"{{$residents->voter_status=="Non Voter" ? 'selected' :''}}>Non Voter</option>
                        </select>
                    </div>		

                    @Error('voter_status')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror

                    </div>			
                </div>

                
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Citizenship</label>
                        <input type="text" class="form-control" name="citizenship" value="{{$residents->citizenship}}" required autocomplete="citizenship">
                    </div>	
                    
                    @Error('citizenship')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror
                    
                    </div>			
                </div>

            </div>

            <div class="row register-form">
                <div class="col-sm-4">
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" class="form-control" name="email" value="{{$residents->email}}" required autocomplete="email">
                     </div>

                     @Error('email')
                     <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" name="phone_number" value="{{$residents->phone_number}}" required autocomplete="phone_number">
                    </div>	
                    
                    @Error('phone_number')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror
                    
                    </div>			
                </div>

                
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Occupation</label>
                        <input type="text" class="form-control" name="occupation" value="{{$residents->occupation}}" required autocomplete="occupation">
                    </div>	
                    
                    @Error('occupation')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror

                    </div>			
                </div>

            </div>


                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
            </form>
        </div>
     
    </div>
</div>

              @endforeach
            </tbody>

          </table>
          <div class="clearfix">
            {{$resident->links()}}
        </div>
    
        </div>
      </div>
      
      
      <script>
       var loadFile = function(event){
        var resident_image2 = document.getElementByID("resident_image2");
        resident_image2.src = URL.createObjectURL(event.target.files[0]);
       }
    </script>

       
{{-------------------------------------------ADD RESIDENTS---------------------------------}}
    <div id="addResidentsModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="/residents" method="POST" enctype="multipart/form-data" id="image-upload-preview">
                    @csrf

                    <div class="modal-header">						
                        <h4 class="modal-title">Add Residents</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="row register-form">
                        
                            <div class="modal-body">
                                <div class="form-group">
                                <label class="labelImage">Image</label>
                                <img class="preview" id="prview" src="storage/no/-image.png"/>
                                <input type="file"  name="resident_image" id="resident_image">
                             </div>
                            
                             @Error('resident_image')
                             <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
                        
                       
                        </div>
                    </div>
                    
                   
                <div class="row register-form">
                    <div class="col-sm-4">
                        <div class="modal-body">					
                            <div class="form-group">
                                <label >First Name</label>
                                <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}" required autocomplete="first_name">
                            
                                @Error('first_name')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" value="{{old('middle_name')}}" required autocomplete="middle_name">
                        </div>

                        @Error('middle_name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror

                        </div>
                    </div>
                

                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}" required autocomplete="last_name">
                    </div>

                    @Error('last_name')
                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    </div>
                </div>
            </div>

                

             <div class="row register-form">
                    <div class="col-sm-4">
                        <div class="modal-body">
                            <div class="form-group">
                            <label>Nickname</label>
                            <input type="text" class="form-control" name="nickname" value="{{old('nickname')}} " required autocomplete="nickname">
                         </div>

                         @Error('nickname')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Place of Birth</label>
                            <input type="text" class="form-control" name="place_of_birth" value="{{old('place_of_birth')}}" required autocomplete="place_of_birth">
                        </div>	
                        
                        @Error('place_of_birth')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                        
                        </div>			
                    </div>

                    
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Birthdate</label>
                            <input type="date" class="form-control" name="birthdate" value="{{old('birthdate')}}" required autocomplete="birthdate">
                        </div>	
                        
                        @Error('birthdate')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror

                        </div>			
                    </div>

                </div>

                <div class="row register-form">
                    <div class="col-sm-4">
                        <div class="modal-body">
                            <div class="form-group">
                            <label>Age</label>
                            <input type="text" class="form-control" name="age" value="{{old('age')}}" required autocomplete="age">
                         </div>

                         @Error('age')
                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Civil Status</label>
                            <input type="text" class="form-control" name="civil_status" value="{{old('civil_status')}}" required autocomplete="civil_status">
                        </div>	
                        
                        @Error('civil_status')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror

                        </div>			
                    </div>

                    
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Gender</label>
                            <select class="form-control" name="gender" value="{{old('gender')}}" required autocomplete="gender">
                                <option value="">-Select Gender-</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        
                        @Error('gender')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror

                        </div>			
                    </div>

                </div>

                <div class="row register-form">
                    <div class="col-sm-4">
                        <div class="modal-body">
                            <div class="form-group">
                            <label>Street</label>
                            <input type="text" class="form-control" name="street" value="{{old('street')}}" required autocomplete="street">
                         </div>

                         @Error('street')
                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Voter Status</label>
                            <select class="form-control" name="voter_status" value="{{old('voter_status')}}" required autocomplete="voter_status">
                                <option value="">-Select Voter Status-</option>
                                <option value="Voter">Voter</option>
                                <option value="Non Voter">Non Voter</option>
                            </select>
                        </div>		

                        @Error('voter_status')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror

                        </div>			
                    </div>

                    
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Citizenship</label>
                            <input type="text" class="form-control" name="citizenship" value="{{old('citizenship')}}" required autocomplete="citizenship">
                        </div>	
                        
                        @Error('citizenship')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror
                        
                        </div>			
                    </div>

                </div>

                <div class="row register-form">
                   

                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" name="phone_number" value="{{old('contact_number')}}" required autocomplete="contact_number">
                        </div>	
                        
                        @Error('phone_number')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror
                        
                        </div>			
                    </div>

                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Occupation</label>
                            <input type="text" class="form-control" name="occupation" value="{{old('occupation')}}" required autocomplete="occupation">
                        </div>	
                        
                        @Error('occupation')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror

                        </div>			
                    </div>

                </div>
                <div class="row register-form">
                    <div class="col-sm-6">
                        <div class="modal-body">
                            <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" class="form-control" name="email" value="{{old('email')}}" required autocomplete="email">
                         </div>

                         @Error('email')
                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="modal-body">
                            <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" value="{{old('password')}}" required autocomplete="password">
                         </div>

                         @Error('password')
                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                        </div>
                    </div>
                </div>


             

                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                    
                </form>
                
            </div>
          
            
   </div>

        </div>
    </div> 
  </div> 
  <script>
    resident_image.onchange = evt => {
      const [file] = resident_image.files
      if (file) {
        prview.style.visibility = 'visible';
    
        prview.src = URL.createObjectURL(file)
      }
    }
</script>


@endsection