@extends('layout.dashboard-layout')

@section('content')

<h2>Profiling Voters</h2>
<body class="hm-gradient">
    
    <main>
        
        <!--MDB Tables-->
        <div class="container mt-4">

            <div class="card mb-4">
                <div class="card-body">

                    <div class="col-md-12">
                        <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">VOTERS</h2>
                        <div class="input-group md-form form-sm form-2 pl-0" action="/searchSenior">
                            <input class="form-control my-0 py-1 pl-3 purple-border" name="search" type="text" placeholder="Search Name" aria-label="Search">
                            <span class="input-group-addon waves-effect purple lighten-2" id="basic-addon1"><a><i class="fa fa-search white-text" aria-hidden="true"></i></a></span>
                        </div>
                    </div>


                    <!--Table-->
                    <table class="table table-hover">
                        <!--Table head-->
                        <thead class="mdb-color darken-3">
                            <tr class="text-white">
                                <th>#</th>
                                <th>Image</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Age</th>
                                <th>Birthdate</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        @foreach($voter as $voters)
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><img class="imagePreview" src="{{$voters->resident_image ? asset ('storage/' .$voters->resident_image) : asset('/storage/images/-image.png')}}" alt=""  /></td>
                                <td>{{$voters->first_name}}</td>
                                <td>{{$voters->last_name}}</td>
                                <td>{{$voters->nickname}}</td>
                                <td>{{$voters->age}}</td>
                                <td>{{$voters->birthdate}}</td>
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

@endsection