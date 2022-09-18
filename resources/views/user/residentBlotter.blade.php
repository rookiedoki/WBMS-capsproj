<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<head>
    <title>WBMS | Paloyon Oriental</title>
    @foreach($setting as $settings)
    <link rel="icon" href="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}">
    @endforeach
    <link href="{{url('assets/css/User/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    {{-- <link href="{{url('assets/css/User/style.css')}}" rel="stylesheet" type="text/css"> 
    <link href="{{url('assets/css/User/font-awesome.css')}}" rel="stylesheet" type="text/css"> 
    <link href="{{url('assets/css/User/animation.css')}}" rel="stylesheet" type="text/css"> --}}
    
</head>
<style>
    <body>
    .alert{
      background: cyan;
      padding: 20px 40px;
      min-width: 420px;
      position: absolute;
      right: 0px;
      top: 10px;
      border-radius: 4px;
      border-left: 8px solid #ffa502;
      color:black;
      }
  
   </style>
      <!--Navbar-->
      @if(session()->has('message'))
      <div class="alert">
      <button type="button" class="close" data-dismiss="alert">x</button>
      {{session()->get('message')}}
  
    </div>
    @endif
    <form action="/requestBlotter/send" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="container">
      <div class="row">
        <div>
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Manage Blotter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Complainant</label>
                                        <input type="text" class="form-control" placeholder="Enter Complainant Name" name="complainant" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Respondent</label>
                                        <input type="text" class="form-control" placeholder="Enter Respondent Name" name="respondent" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Victim(s)</label>
                                        <input type="text" class="form-control" placeholder="Enter Victim(s) Name" name="victim" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" class="form-control" placeholder="Enter Location" name="location" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" class="form-control" name="date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Time</label>
                                        <input type="time" class="form-control" name="time" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option disabled selected>Select Blotter Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Settled">Settled</option>
                                            <option value="Scheduled">Scheduled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Details</label>
                                <textarea class="form-control" placeholder="Enter Blotter or Incident here..." name="details" required></textarea>
                            </div>
                    
                             <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                        <button type="text" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                   
                </div>
            </div>
        </div>
         </div>

        </div>
      </div>
    </div>
    </form>
