<?php

namespace App\Http\Controllers\AdminSide;

use App\Models\AdminResidents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilingController extends Controller
{
    //User Profiling 
    public function profiling(){
        return view('user.profiling');
    }


     //Admin Senior Profiling 
     public function seniorProfiling(){

        $senior = AdminResidents::all()->where('age','>','59');
        return view('admin.seniorProfiling',['senior'=>$senior]);
    }

      //Admin Voters Profiling 
      public function votersProfiling(){

        $voter = AdminResidents::all()->where('voter_status','=','Voter');
        return view('admin.votersProfiling',['voter'=>$voter]);
    }

      //Search Senior Cetizen

      public function searchSenior(Request $request){
        return view('Admin.seniorProfiling', [
            'search' => AdminResidents::latest()->filter(request(['search']))->paginate(5)
        ]);

    }
}
