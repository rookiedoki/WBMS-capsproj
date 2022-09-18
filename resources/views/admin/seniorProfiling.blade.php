@extends('layout.dashboard-layout')

@section('content')

<button class="btn btn-info btn-border btn-round btn-sm" onclick="printDiv('printThis')">
    <i class="fa fa-print"></i>
    Print Certificate
  </button>

<h2>Profiling Senior Citizens</h2>
<body class="hm-gradient">
    

    <main>
        
        <!--MDB Tables-->
        <div class="container mt-4" id="printThis">
            <div class="card mb-4">
                <div class="card-body">

                    <div class="col-md-12">
                        <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">SENIOR CITIZENS</h2>
                        <div class="input-group md-form form-sm form-2 pl-0" action="/searchSenior">
                            <input class="form-control my-0 py-1 pl-3 purple-border" type="text" name="search" placeholder="Search Name" aria-label="Search">
                            {{-- <span class="input-group-addon waves-effect purple lighten-2" id="basic-addon1"><a><i class="fa fa-search white-text" aria-hidden="true"></i></a></span> --}}
                        </div>
                    </div>


                    <!--Table-->
                    <table class="table table-hover">
                        <!--Table head-->
                        <thead class="mdb-color darken-3">
                            <tr class="text-white">
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Age</th>
                                <th>Birthdate</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        @foreach($senior as $seniors)
                       
                        <tbody>
                            <tr>
                               
                                <th scope="row">{{$loop->iteration }}</th>
                                <td><img class="imagePreview" src="{{$seniors->resident_image ? asset ('storage/' .$seniors->resident_image) : asset('/storage/images/-image.png')}}" alt=""  /></td>
                                <td>{{$seniors->first_name}} {{$seniors->last_name}}</td>
                                <td>{{$seniors->nickname}}</td>
                                <td>{{$seniors->age}}</td>
                                <td>{{$seniors->birthdate}}</td>
                            </tr>
                        </tbody>
                        @endforeach
                        <!--Table body-->
                    </table>
                    <!--Table-->
                </div>
            </div>
           
        
          

        </div>
        <!--MDB Tables-->
      
    </main>
  
</body>
<script>
    function openModal(){
        $('#barangayClearance').modal('show');
    }

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
  </script>
@endsection