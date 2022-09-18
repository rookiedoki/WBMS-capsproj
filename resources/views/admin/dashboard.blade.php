@extends('layout.dashboard-layout')

@section('content')
<div class="row my-4">
  <div class="col-md-4">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col">
            <small class="text-muted mb-1">Population</small>
            <h3 class="card-title mb-0">{{ $residents ?? '0'}}</h3>
          </div>
          <div class="col-4 text-right">
            <i class="fas fa-users"></i>
          </div>
        </div> <!-- /. row -->
      </div> <!-- /. card-body -->
    </div> <!-- /. card -->
  </div> <!-- /. col -->
  <div class="col-md-4">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col">
            <small class="text-muted mb-1">Male</small>
            <h3 class="card-title mb-0">{{ $male ?? '0'}}</h3>
           
          </div>
          <div class="col-4 text-right">
            <i class="fas fa-male" ></i>
          </div>
        </div> <!-- /. row -->
      </div> <!-- /. card-body -->
    </div> <!-- /. card -->
  </div> <!-- /. col -->
  <div class="col-md-4">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col">
            <small class="text-muted mb-1">Female</small>
            <h3 class="card-title mb-0">{{ $female ?? '0'}}</h3>
           
          </div>
          <div class="col-4 text-right">
            <i class="fas fa-female"></i>
          </div>
        </div> <!-- /. row -->
      </div> <!-- /. card-body -->
    </div> <!-- /. card -->
  </div> <!-- /. col -->
  <div class="col-md-4">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col">
            <small class="text-muted mb-1">Senior Citizen</small>
            <h3 class="card-title mb-0">{{ $senior ?? '0'}}</h3>
           
          </div>
          <div class="col-4 text-right">
            <i class="fas fa-blind"></i>
          </div>
        </div> <!-- /. row -->
      </div> <!-- /. card-body -->
    </div> <!-- /. card -->
  </div> <!-- /. col -->
  
</div>
@endsection