@extends('layout.dashboard-layout')
@section('content')
<h2 class="h2 mb-1">Request Certificate </h2>
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
          <th>Fullname</th>
          <th>Type of Document</th>
          <th>Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      @foreach($ind as $indigency)
      <tbody>
        <tr>
          <td>
            <div class="image-round">
              <img class="imagePreview" src="{{$indigency->profile_image ? asset ('storage/' .$indigency->profile_image) : asset('/storage/images/-image.png')}}" alt=""  />
            </div> 
          </td>
          <td class="show"> {{$indigency->fullname}}</td>   
            <td class="show" >{{$indigency->doctype}}</td>
            <td class="show"><?= date('F j, Y, g:i a') ?></td>
            <td>
              <a href="#editIndigencyModal{{$indigency->id}}" class="edit" data-toggle="modal" ><button class="btn"><i class="fas fa-eye fa-minimize" ></i></button></a>
            </td>
            
        </tr>

        {{--  --}}

        {{--  --}}
        
        <div id="editIndigencyModal{{$indigency->id}}" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="barangayIndigency">Mode of Payment</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form action="{{url('certificateOfIndigency/barangayIndigency',$indigency->id)}}">
                    <div class="form-group">
                      <label>Payment Method</label>
                      <input type="text" class="form-control" name="date" value="{{$indigency->paymentMethod}}" disabled>
                  </div>
                    <div class="form-group">
                      <label>Pick Up Date</label>
                      <input type="text" class="form-control" name="date" value="{{$indigency->date}}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Purpose</label>
                        <textarea class="form-control" placeholder="Enter Payment Details" name="details" disabled>{{$indigency->purpose}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>Reference Number</label>
                      <input type="text" class="form-control" name="date" value="{{$indigency->referenceNumber}}" disabled>
                    </div>
                    <div class="form-group">
                      <label>Screenshot of Proof</label>
                      <div id="image-show-area">
                        <img src="{{$indigency->screenshot ? asset ('storage/' .$indigency->screenshot) : asset('/storage/images/-image.png')}}" alt="screenshot" style="width: 100%"  />
                      </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="name" value="---">
                        <a class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">Decline</a>                        
                        <button type="submit" class="btn btn-primary">Approve</button>
                    </div>
                </form>
              </div>
             </div>
          </div>  
          {{-- <script>
            setTimeout(function(){ openModal(); }, 1000);
        </script> --}}
        </div>

      </tbody>

      @endforeach
    </table> 
    </div>
  </div>
@endsection