<?php

namespace App\Http\Controllers\AdminSide;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AdminResidents;
use Illuminate\Validation\Rule;
use App\Models\ResidentsRegistration;


class UserController extends Controller
{
    public function register(){      
        return view('/register');

    }

     //Register Admin Residents Storing Data
     public function registerStore(Request $request){
     
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
            'email' => ['required', 'email', Rule::unique('users','email')],
            'phone_number' =>  'required',
            'occupation' =>'required',
            'password' =>'required'
           
        ]);

        if($request->hasFile('profile_image','&&', 'image_id_birth')){
            $formFields['profile_image'] = $request->file('profile_image')->store('images', 'public');
            $formFields['image_id_birth'] = $request->file('image_id_birth')->store('images', 'public');
        }   

        $registration = ResidentsRegistration::create($formFields);

        return back()->with('message', 'Registration Complete');

}

//Residents registration 
public function registration(){
        
    $reg = ResidentsRegistration::paginate(5);
    return view('Admin.registration',['reg'=>$reg]);

}
    
 //View Residents
 public function viewRegistration($id){
        
    $reg = ResidentsRegistration::find($id);
    return view('admin.viewRegistration', ['reg'=>$reg]);

}

 //Accept Registration in Admin and Store in database to create Account
 public function acceptRegistration(Request $request){
     
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
        'email' => ['required', 'email', Rule::unique('users','email')],
        'phone_number' =>  'required',
        'occupation' =>'required',
        'password' =>'required'
       
    ]);
    $formFields['password'] = bcrypt($formFields['password']);

    if($request->hasFile('profile_image','&&', 'image_id_birth')){
        $formFields['profile_image'] = $request->file('profile_image')->store('images', 'public');
        $formFields['image_id_birth'] = $request->file('image_id_birth')->store('images', 'public');
    }   
    else{
        $formFields['resident_image'] = $request->oldprofile_image;
        $formFields['oldimage_id_birth'] = $request->oldimage_id_birth;
    }
    $reg = AdminResidents::create($formFields);
    return redirect('/residents')->with('message', 'Residents Registration Accepted');
}

public function activityLog(){
    return view ('admin.activitylog');
}



}
