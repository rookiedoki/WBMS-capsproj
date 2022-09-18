<?php

namespace App\Http\Controllers\AdminSide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blotter;

class BlotterReportController extends Controller
{
        public function blotter(){
            $blo = Blotter::all();
            return view('admin.blotter', ['blo'=>$blo]);
    
    }
    public function deleteBlotter($id)
    {
        $blotter = Blotter::find($id);

        $blotter->delete();

        return back()->with('message', 'Blotter Case Deleted');

    }
      //Approve
      public function submitBlotter($id){
        $blo = Blotter::find($id);
        return view('admin.blotterLetter',['blo'=>$blo]);
        }
        
        
}
