<?php

namespace App\Http\Controllers\AdminSide;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\BlotterRecords;
use App\Models\FinancialReport;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreFileRequest;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */

    /**Accomplishment Report*/
    public function reports(){
        $files = File::all();
        return view('admin.reports', ['files' => $files]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(){
        return view('admin.create');
    }

    public function deletefile($id) {
        $file=File::find($id);
        $file->delete();
    
        return back()->with('message', 'File Deleted');
    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request){
        $fileName = $request->file->getClientOriginalName();   

        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();

        $request->file->move(public_path('file'), $fileName);

        File::create([
            // 'user_id' => auth()->id(),
            'name' => $fileName,
            'type' => $type,
            'size' => $size
        ]);

        return redirect('/reports')->withSuccess(__('File added successfully.'));
    }

    public function download(Request $request,$file){
        return response()->download(public_path('assets/'.$file));
    }

    public function viewFile($id){
        $file = File::find($id);
        return view('admin.file', ['file'=>$file]);
    }

    /*For Financial Report */
    public function financialreport(){
        $files2 = FinancialReport::all();
        return view('admin.financialreport', ['files2' => $files2]);
    }

    public function create2(){
        return view('admin.create2');
    }
        
    public function deletefile2($id){
        $file2=FinancialReport::find($id);
        $file2->delete();
        return back()->with('message', 'File Deleted');
    }

    public function store2(StoreFileRequest $request){
        $fileName = $request->file->getClientOriginalName();   
        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();
        $request->file->move(public_path('file'), $fileName);

        FinancialReport::create([
            // 'user_id' => auth()->id(),
            'name' => $fileName,
            'type' => $type,
            'size' => $size
        ]);

        return redirect('/financialreport')->withSuccess(__('File added successfully.'));
    }
        /*For Blotter Records */
        public function blotterrecord(){
            $files3 = BlotterRecords::all();
            return view('admin.blotterrecord', ['files3' => $files3]);
        }
    
        public function create3(){
            return view('admin.create3');
        }
            
        public function deletefile3($id){
            $file3=BlotterRecords::find($id);
            $file3->delete();
            return back()->with('message', 'File Deleted');
        }
    
        public function store3(StoreFileRequest $request){
            $fileName = $request->file->getClientOriginalName();   
            $type = $request->file->getClientMimeType();
            $size = $request->file->getSize();
            $request->file->move(public_path('file'), $fileName);
    
            BlotterRecords::create([
                // 'user_id' => auth()->id(),
                'name' => $fileName,
                'type' => $type,
                'size' => $size
            ]);
    
            return redirect('/blotterrecord')->withSuccess(__('File added successfully.'));
        }
    
}
 