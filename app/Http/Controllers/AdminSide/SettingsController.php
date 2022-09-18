<?php

namespace App\Http\Controllers\AdminSide;

use App\Http\Controllers\Controller;
use App\Models\settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

//Settings
public function settings(){
    $setting = settings::all();
    return view('admin.settings', ['setting'=>$setting]);
}


//Update Barangay Officialss
public function updateSettings(Request $request, settings $setting){
        
    $formFields = $request->validate([
        'barangay_name' =>'required',
       
    ]);
    if($request->hasFile('barangay_logo')){
        $formFields['barangay_logo'] = $request->file('barangay_logo')->store('images', 'public');
    }
    $setting->update($formFields);
    return back()->with('message', 'Update Successful');

}
}
