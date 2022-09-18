<?php

namespace App\Http\Controllers\AdminSide;

use App\Http\Controllers\Controller;
use App\Models\AdminResidents;
use App\Models\barangayOfficial;
use App\Models\Certificate;
use App\Models\RequestCertificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function certificateOfResidency(){
        $res = RequestCertificate::all()->where('doctype','=','Certificate of Residency');
        return view('admin.certificateOfResidency',['res'=>$res]);
        }
       
        public function certificateOfIndigency(){
            $ind = RequestCertificate::all()->where('doctype','=','Certificate of Indigency');
            return view('admin.certificateOfIndigency',['ind'=>$ind]);
            }

        public function certificateOfClearance(){
            $clear = RequestCertificate::all()->where('doctype','=','Barangay Clearance');
            return view('admin.certificateOfClearance',['clear'=>$clear]);
            }

    public function barangayClearance($id){
        $cer = AdminResidents::find($id);
        return view('admin.barangayClearance',['cer'=>$cer]);
        }
        public function barangayResidency($id){
            $cer = AdminResidents::find($id);
            return view('admin.barangayResidency',['cer'=>$cer]);
            }
        public function barangayIndigency($id){
            $cer = AdminResidents::find($id);
            return view('admin.barangayIndigency',['cer'=>$cer]);
            }
        
      

        public function deleteRequest($id)
        {
            $cer=RequestCertificate::find($id);
        
            $cer->delete();
        
            return back()->with('message', 'Request Deleted');
        
        }

        

            // public function barangayResidency($id){
            //     $cer = AdminResidents::find($id);
            //     return view('admin.barangayIndigency',['cer'=>$cer]);
            //     }
        public function certificateStore(Request $request, Certificate $certificate){
     
            $formFields = $request->validate([
                'first_name' =>'required',
                'middle_name' =>'required',
                'last_name' =>'required',
                'nickname' =>'required',
                'place_of_birth' =>'required',
                'birthdate' => 'required',
                'age' =>'required|before:13 years ago',
                'civil_status' => 'required',
                'street' => 'required',
                'gender' => 'required', 
                'voter_status' => 'required',
                'citizenship' => 'required',
                'email' => ['required', 'email'],
                'phone_number' =>  'required',
                'occupation' =>'required',
                'password' =>'required'
            ]);

            if($request->hasFile('profile_image')){
                $formFields['profile_image'] = $request->file('profile_image')->store('images', 'public');
            }
            $certificate ->update($formFields);
            return back()->with('message', 'Update Successful');
    }

   
}
