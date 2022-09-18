<?php

namespace App\Http\Controllers\AdminSide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminResidents;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminResidentsController extends Controller
{
    public function dashboard(){

     $residents = DB::table('admin_residents')->count();
     $male = DB::table('admin_residents')
     ->where('gender','=','Male')->count();
     $female = DB::table('admin_residents')
     ->where('gender','=','Female')->count();
     $voter = DB::table('admin_residents')
     ->where('voter_status','=','Voter')->count();
     $nonvoter = DB::table('admin_residents')
     ->where('voter_status','=','Non Voter')->count();
     $senior = DB::table('admin_residents')
     ->where('age','>','59')->count();
     
     return view('admin.dashboard',['residents'=>$residents, 'male'=>$male,'female'=>$female,'senior'=>$senior,'voter'=>$voter,'nonvoter'=>$nonvoter]);

    }

    //Reports
    public function reports(){
        return view('Admin.reports');
    }
    public function folders(){
        return view('Admin.folders');
    }
    
    public function blotter(){
        return view('Admin.blotter');
    }

    //View Messages page
    public function messages(){
        return view ('Admin.messages');
    }

    // Revenues
    public function revenues(){
        return view ('Admin.revenues');
    }

    //Show Admin Calendar Form
    public function calendar(){
        return view('Admin.calendar');
    }

    //Show Admin Residents Form
    public function residents(){
        
        $resident = AdminResidents::paginate(5);
        return view('Admin.residents',['resident'=>$resident]);

    }

    //View Residents
    public function viewResidents($id){
        
        $resident = AdminResidents::find($id);
        return view('admin.viewResidents', ['resident'=>$resident]);

    }

    //Search Residents
    public function search_residents(Request $request){
        return view('Admin.residents', [
            'resident' => AdminResidents::latest()->filter(request(['search']))->paginate(5)
        ]);

    }

       //Admin Adding Residents Storing Data
       public function adminStore(Request $request){
        
        $formFields = $request->validate([
            'first_name' =>'required',
            'middle_name' =>'required',
            'last_name' =>'required' ,
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

        if($request->hasFile('resident_image')){
            $formFields['resident_image'] = $request->file('resident_image')->store('images', 'public');
        }

        $adminResidents = AdminResidents::create($formFields);

        return redirect('/residents')->with('message', 'User Created Successfuly');

}

    //Delete Residents
    public function deleteResidents($id)
    {
        $residents=AdminResidents::find($id);

        $residents->delete();

        return back()->with('message', 'Residents Profile Deleted');

    }

    //Show Edit Residents Form
    public function editResidents(AdminResidents $residents){

      
        return view('Admin.residents', ['residents' => $residents]);

    }

    
    //Update Residents Admin Form
    public function updateResidents(Request $request, AdminResidents $residents){
        
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
           
        ]);

        // $activityLog = [
        //     'id'            => $id,
        //     'first_name'    => $first_name,
        //     'last_name'     => $last_name,
        //     'email'         => $email,
        //     'userType'      => $userType,
        //     'description'   => $description,
        //     'modify_user'   =>$modify_user,
        // ];
       
        
        if($request->hasFile('resident_image')){
            $formFields['resident_image'] = $request->file('resident_image')->store('images', 'public');
        }

        $residents->update($formFields);

        return back()->with('message', 'Update Successful');
        
    }
    
    //Login
public function login(){

    return view('residentLoginPage');

}
    public function residentLogin(Request $request){

        $formFields = $request->validate([
            'email' =>['required', 'email'],
            'password' =>'required',
        ]);
    
        $residents = AdminResidents::where('email', '=', $request->email)->first();
        if($residents) {
            if(Hash::check($request->password, $residents->password)){
                $request->session()->put('id', $residents->id);
                return redirect('/home');
            }else{
                return back()->with('fail' , ' Password Incorrect ');
            }
        }else{

        return back()->with('fail' , ' This email is not registered. ');
        }
    }

   


}