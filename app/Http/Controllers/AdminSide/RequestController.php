<?php

namespace App\Http\Controllers\AdminSide;

use App\Http\Controllers\Controller;
use App\Models\RequestCertificate;
use App\Models\Blotter;
use App\Models\AdminResidents;
use Illuminate\Http\Request;



class RequestController extends Controller
{
    public function request(){
        return view('user.request');
}

public function residentBlotter(){
    return view('user.residentBlotter');
}


public function viewPayment($id){
    $req = RequestCertificate::find($id);
    return view('admin.certificate', ['req'=>$req]);
}


// public function editResidents(AdminResidents $resident){
//     return view('Admin.certificate', ['resident' => $resident]);

// }

 //Request Storing Data
 public function addrequest(Request $request){
        
    $formFields = $request->validate([
        'fullname' => 'required',
        'docType' =>'required',
        'date' =>'required',
        'paymentMethod' =>'required',
        'referenceNumber' =>'required',
        'purpose' =>'required',
    ]);

    if($request->hasFile('screenshot')){
        $formFields['screenshot'] = $request->file('screenshot')->store('images', 'public');
    }
    $certificate = RequestCertificate::create($formFields);

    return back()->with('message', 'Request Certificate Successful');
}

//Delete Residents


 //Request Storing Data
 public function requestBlotter(Request $request){
        
    $formFields = $request->validate([
        'complainant'   => 'required',
        'respondent'    => 'required',
        'victim'        => 'required',
        'location'      => 'required',
        'date'          => 'required',
        'time'          => 'required',
        'details'       => 'required',
        'status'        => 'required',
    ]);
    $blotter = Blotter::create($formFields);

    return back()->with('message', 'Successfully Reported');
}


}