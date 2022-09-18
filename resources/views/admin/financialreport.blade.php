@extends('layout.dashboard-layout')
@section('content')
<style>

.drop-container {
  position: relative;
  display: flex;
  gap: 10px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 200px;
  padding: 20px;
  border-radius: 10px;
  border: 2px dashed #555;
  color: #444;
  cursor: pointer;
  transition: background .2s ease-in-out, border .2s ease-in-out;
}

.drop-container:hover {
  background: #eee;
  border-color: #111;
}

.drop-container:hover .drop-title {
  color: #222;
}

.drop-title {
  color: #444;
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  transition: color .2s ease-in-out;
}

input[type=file] {
  width: 900px;
  max-width: 100%;
  color: rgb(250, 250, 250);
  padding: 5px;
  border-radius: 10px;
  border: 1px solid #555;
}

input[type=file]::file-selector-button {
  margin-right: 20px;
  border: none;
  background: #084cdf;
  padding: 10px 20px;
  border-radius: 10px;
  color: #fff;
  cursor: pointer;
  transition: background .2s ease-in-out;
}

input[type=file]::file-selector-button:hover {
  background: #03399e;
}
.btns {
  border: none;
  color: white;
  padding: 10px;
  font-size: 8px;
  cursor: pointer;
}
.btn1 {background-color: #fad710;} /* view */
.btn2 {background-color: #df1a0c;} /* delete */
.btn3 {background-color: #17f53c;} /* download */
/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
</style>
<div class="row">
  <!-- Small table -->
  <div class="col-md-12 my-4">
    <h2 class="h4 mb-1">Financial Records</h2>
      {{-- <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa print"></i></a> --}}
    <div class="card shadow">
      <div class="card-body"> 
        
        {{--  --}}
          
          <form action="{{url('/financialreport/store2')}}" method="post" enctype="multipart/form-data">
          @include('layouts.partials.messages')
            @csrf
            <input type="file" class="mb-3" name="file"  class="form-control" accept=".doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip" required>
            <button class="btn btn-primary" type="submit">Upload</button>
          </form>
  
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Size</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($files2 as $file)
                <tr>
                  <td width="3%">{{ $file->id }}</td>
                  <td>{{ $file->name }}</td>
                  <td width="10%">{{ $file->size }}</td>
                  <td width="10%">{{ $file->type }}</td>
                  <td width="25%">
                    <a href="{{url('reports/viewFile',$file->id)}}" data-toggle="modal"><button class="btns btn1"><i class="fa fa-eye"></i></button></a>
                    <a href="#deleteFile2{{$file->id}}" data-toggle="modal"><button class="btns btn2"><i class="fa fa-trash"></i></button></a>
                    <a href="{{url('download',$file->id)}}" data-toggle="modal"><button class="btns btn3"><i class="fa fa-download"></i></button></a>
                    {{-- <a href="#deleteFile{{$file->id}}" data-toggle="modal" class="btn btn-success">delete</a>
                    <a href="#deleteFile{{$file->id}}" data-toggle="modal" class="btn btn-success btn-sm">View</a>
                    <a href="#deleteFile{{$file->id}}" data-toggle="modal" class="btn btn-danger btn-sm">Download</a> --}}
                  </td>
                </tr>
              <!---------------------------------------- Delete Residents Modal HTML -------------------------------------->
              <div id="deleteFile2{{$file->id}}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">						
                                <h4 class="modal-title">Delete File</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
        
        
                            <div class="modal-body">					
                                <p>Are you sure you want to delete this file?</p>
                                <p class="text-warning"><small>This action cannot be undone.</small></p>
                            </div>
                            <div class="footer" style="text-align: right;">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                {{-- <input type="submit" href="{{url('deleteResidents', $residents->id)}}" class="btn btn-danger" value="Delete"> --}}
                                <a class="btn btn-danger" href="{{url('deleteFile2',$file->id)}}">Delete</a>
                            </div>
        
                        </form>
                    </div>
                </div>
            </div>
              
              @endforeach
            </tbody>
          </table>
        {{--  --}}
      </div>
    </div>
    </div>
  </div>
@endsection