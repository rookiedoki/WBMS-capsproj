<?php

namespace App\Http\Controllers\AdminSide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcements;


class AnnouncementsController extends Controller
{
    public function announcements(){
        $ann= Announcements::all();
        return view('admin.announcements',['ann'=>$ann]);

}

    //Announcement Storing Data
    public function announcementStore(Request $request){
        
        $formFields = $request->validate([
            'title' =>'required',
            'description' =>'required',
            'content' =>'required',   
        ]);
        

        $announcement = Announcements::create($formFields);
        return back()->with('message', 'Announcement Created Successfuly');

}


    //Announcement Update Data
    public function updateAnnouncements(Request $request, Announcements $announcement){
        
        $formFields = $request->validate([
            'title' =>'required',
            'description' =>'required',
            'content' =>'required',   
        ]);
        

        $announcement->update($formFields);
        return back()->with('message', 'Announcement Updated Successfuly');

}

public function deleteAnnouncements($id)
{
    $annou=Announcements::find($id);

    $annou->delete();

    return back()->with('message', 'Announcement Deleted Succesfull');

}

}
