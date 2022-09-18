@extends('layout.dashboard-layout')

@section('content')

<h1>Announcements <i class="fas fa-bullhorn fe-50"></i></h1>  

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        {{-- <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa print"></i></a> --}}
      <div class="card shadow">
        <div class="card-body">
          <div class="toolbar">
            <form class="form">
              <div class="form-row">
                <div class="form-group col-auto mr-auto">

                  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addAnnouncementModal"><i class="material-icons">&#xE147;</i> <span> &nbsp;&nbsp;&nbsp;Add New Announcements</span></a>
              
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
                
                <th style="width:12%">Image</th>
                <th style="width:15%">Title</th>
                <th style="width:18%">Descritpion</th>
                <th >Content</th>
                <th style="width:12%">Created At</th>
                <th style="width:12%"> Actions  </th>
              </tr>
            </thead>

          @foreach($ann as $announcements)
            <tbody>
              <tr>
                
                {{-- <td>
                  <div class="image-round">
                    <img class="imagePreview" src="{{$residents->resident_image ? asset ('storage/' .$residents->resident_image) : asset('/storage/images/-image.png')}}" alt=""  />
                  </div>
                </td> --}} 
                <td href="#showResidentsModal{{$announcements->id}}" class="show" data-toggle="modal">{{$announcements->name}}</td>
               
                <td href="#showResidentsModal{{$announcements->id}}" class="show" data-toggle="modal">{{$announcements->title}}</td>
                <td href="#showResidentsModal{{$announcements->id}}" class="show" data-toggle="modal">{{$announcements->description}}</td>
                <td href="#showResidentsModal{{$announcements->id}}" class="show" data-toggle="modal">{{Str::limit($announcements->content, 30)}}</td>
                <td href="#showResidentsModal{{$announcements->id}}" class="show" data-toggle="modal">{{$announcements->created_at}}</td>
                <td>
                    <a href="#editAnnouncementModal{{$announcements->id}}" class="edit" data-toggle="modal" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#deleteAnnouncementModal{{$announcements->id}}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    <a href="{{url('viewAnnouncement',$announcements->id)}}" ><i class="fas fa-eye" ></i></a>
                    {{-- <a class="btn btn-danger" href="{{url('viewResidents',$residents->id)}}">View</a> --}}
                  
                </td>
              </tr>

              {{-- ---------------------------------------------Edit Announcements----------------------------------------- --}}
              
              <div id="editAnnouncementModal{{$announcements->id}}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
        
                      <form action="/updateAnouncements/{{$announcements->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
        
                            <div class="modal-header">						
                                <h4 class="modal-title">Add Anouncements</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            
                           
                        <div class="row register-form">
                            <div class="col-sm-12">
                                <div class="modal-body">					
                                    <div class="form-group">
                                        <label >Title</label>
                                        <input type="text" class="form-control" name="title" value="{{$announcements->title}}" required autocomplete="title">
                                    
                                        @Error('title')
                                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row register-form">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="modal-body">
                                    <p><label for="description">Description</label></p>
                                    <textarea id="description" class="form-control" name="description"  rows="2" cols="50">  {{$announcements->description}} </textarea>
                            </div>
        
                            @Error('description')
                                 <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
        
                            </div>
                        </div>
                    </div>
                    <div class="row register-form">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="modal-body">
                                    <p><label for="content">Content</label></p>
                                    <textarea id="content"  class="form-control" name="content" rows="5" cols="50"> {{$announcements->content}} </textarea>
                            </div>
        
                            @Error('content')
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
      
                <!---------------------------------------- Delete Residents Modal HTML -------------------------------------->
                <div id="deleteAnnouncementModal{{$announcements->id}}" class="modal fade">
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
                                    {{-- <input type="submit" href="{{url('deleteResidents', $announcements->id)}}" class="btn btn-danger" value="Delete"> --}}
                                  <a class="btn btn-danger" href="{{url('deleteAnnouncements',$announcements->id)}}">Delete</a>
                                </div>
            
                            </form>
                        </div>
                    </div>
                </div>  



      
                @endforeach
            </tbody>

          </table>
       
    
        </div>
      </div>
    
   {{-- -----------------------------------Add Announcement-------------------------------------- --}}
      <div id="addAnnouncementModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="/announcementStore" method="POST" enctype="multipart/form-data" id="image-upload-preview">
                    @csrf

                    <div class="modal-header">						
                        <h4 class="modal-title">Add Anouncements</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    
                   
                <div class="row register-form">
                    <div class="col-sm-12">
                        <div class="modal-body">					
                            <div class="form-group">
                                <label >Title</label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}" required autocomplete="title">
                            
                                @Error('title')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row register-form">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="modal-body">
                            <p><label for="description">Description</label></p>
                            <textarea id="description"  class="form-control" name="description" rows="2" cols="50"> {{old('description')}} </textarea>
                    </div>

                    @Error('description')
                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    </div>
                </div>
            </div>
            <div class="row register-form">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="modal-body">
                            <p><label for="content">Content</label></p>
                            <textarea id="content"  class="form-control" name="content"  rows="5" cols="50"> {{old('content')}} </textarea>
                    </div>

                    @Error('content')
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

        {{-- -----------------------------------Edit Announcement-------------------------------------- --}}

       

    </div> 
  </div> 


@endsection