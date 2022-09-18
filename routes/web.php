<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminSide\UserController;
use App\Http\Controllers\ClientSide\HomeController;
use App\Http\Controllers\AdminSide\SettingsController;
use App\Http\Controllers\AdminSide\AdminResidentsController;
use App\Http\Controllers\AdminSide\ProfilingController;
use App\Http\Controllers\AdminSide\BlotterReportController;
use App\Http\Controllers\AdminSide\BarangayOfficialController;
use App\Http\Controllers\AdminSide\AnnouncementsController;
use App\Http\Controllers\AdminSide\FilesController;
use App\Http\Controllers\AdminSide\CertificateController;
use App\Http\Controllers\AdminSide\UploadFileController;
use App\Http\Controllers\AdminSide\RequestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});


// // Barangay Clearance
// Route::get('/brgyClearance', [CertificateController::class, 'brgyClearance']);

//Request
Route::get('/request', [RequestController::class, 'request']);
//Request store in db
Route::post('/request', [RequestController::class, 'addrequest']);

//Blotter Report
Route::get('/residentBlotter', [RequestController::class, 'residentBlotter']);
Route::post('/requestBlotter/send', [RequestController::class, 'requestBlotter']);
Route::get('/deleteBlotter/{id}', [BlotterReportController::class, 'deleteBlotter']);
Route::get('/submitBlotter/blotterLetter/{id}', [BlotterReportController::class, 'submitBlotter']);

//Delete Data from Request
Route::get('/deleteRequest/{id}', [CertificateController::class, 'deleteRequest']);

Route::get('/home', [HomeController::class, 'home']);
Route::get('/adminLoginPage', function () {
    return view('adminLoginPage');
});

//Homepage Client-Side
Route::get('barangay/home', [HomeController::class, 'resident_home']);

//Reports and Statistics
Route::get('/reports', [AdminResidentsController::class, 'reports']);

//List of Barangay Official
Route::get('/listBrgyOfficial', [BarangayOfficialController::class, 'listBrgyOfficial']);

//Residents Register Form
Route::get('/register', [UserController::class, 'register']);

//Residents Register Form
Route::get('/register', [UserController::class, 'register']);

//Register Storing Data
Route::post('/register', [UserController::class, 'registerStore']);

//View Form Residents Registration in Admin
Route::get('/registration', [UserController::class, 'registration']);

//Accept Residents Registration in Admin and Create Account
Route::post('/registration', [UserController::class, 'acceptRegistration']);

//View Residents Registration
Route::get('/viewRegistration/{id}', [UserController::class, 'viewRegistration']);

//View Form Add Barangay Official 
Route::get('/official', [BarangayOfficialController::class, 'official']);

//Store Data of Barangay Official 
Route::post('/storeOfficial', [BarangayOfficialController::class, 'storeOfficial']);

//Edit Form Barangay Official 
Route::get('/editBarangayOfficial/{id}', [BarangayOfficialController::class, 'editOfficial']);

//Update Data from Barangay Official 
Route::put('/updateBarangayOfficial/{official}', [BarangayOfficialController::class, 'updateOfficial']);

//Delete Data from barangay Official
Route::get('/deleteBarangayOfficial/{id}', [BarangayOfficialController::class, 'deleteOfficial']);

//View Residents in Admin 
Route::get('/viewResidents/{id}', [AdminResidentsController::class, 'viewResidents']);

//Admin Dashboard
Route::get('dashboard', [AdminResidentsController::class, 'dashboard']);

//Admin Residents  Form
Route::get('/residents', [AdminResidentsController::class, 'residents']);

//Search Residents 
Route::get('/residents', [AdminResidentsController::class, 'search_residents']);

//Store Data from Admin Residents 
Route::post('/residents', [AdminResidentsController::class, 'adminStore']);

//Delete Data from Admin Residents 
Route::get('/deleteResidents/{id}', [AdminResidentsController::class, 'deleteResidents']);

//Show Edit Form from Admin Residents 
Route::get('/residents/{residents}/edit', [AdminResidentsController::class, 'editResidents']);

//Update Data from Admin Residents 
Route::put('/residents/{residents}', [AdminResidentsController::class, 'updateResidents']);


//Residents Login Form
Route::get('/residentLoginPage', [AdminResidentsController::class, 'login']);

//Login Resident User
Route::post('/residentLogin/auth', [AdminResidentsController::class, 'residentLogin']);

//Admin Login Form
Route::get('/adminLoginPage', [BarangayOfficialController::class, 'login']);

//Login Admin User
Route::post('/adminLogin/auth', [BarangayOfficialController::class, 'adminLogin']);

//Log User Out
Route::post('/logout', [BarangayOfficialController::class, 'logout']);

//Settings 
Route::get('/settings', [SettingsController::class, 'settings']);

//Update Settings 
Route::put('/settings/{setting}', [SettingsController::class, 'updateSettings']);

//Residency
Route::get('/certificateOfResidency', [CertificateController::class, 'certificateOfResidency']);
//Print Residency
Route::get('/certificateOfResidency/barangayResidency/{id}', [CertificateController::class, 'barangayResidency']);

//Indigency
Route::get('/certificateOfIndigency', [CertificateController::class, 'certificateOfIndigency']);
//Print Indigency
Route::get('/certificateOfIndigency/barangayIndigency/{id}', [CertificateController::class, 'barangayIndigency']);

//Clearance
Route::get('/certificateOfClearance', [CertificateController::class, 'certificateOfClearance']);
//Print Clearance
Route::get('/certificateOfClearance/barangayClearance/{id}', [CertificateController::class, 'barangayClearance']);

//Calendar
Route::get('/calendar', [AdminResidentsController::class, 'calendar']);

//Messages
Route::get('/messages', [AdminResidentsController::class, 'messages']);

//Revenues
Route::get('/revenues', [AdminResidentsController::class, 'revenues']);

//Blotter
Route::get('/blotter', [BlotterReportController::class, 'blotter']);

//Records
Route::get('/reports/folders', [AdminResidentsController::class, 'folders']);

// User Profiling 
Route::get('/profiling', [ProfilingController::class, 'profiling']);

// Admin Senior Profiling 
Route::get('/seniorProfiling', [ProfilingController::class, 'seniorProfiling']);

// Admin Voters Profiling 
Route::get('/votersProfiling', [ProfilingController::class, 'votersProfiling']);


//Search Senior Citizen
Route::get('/searchSenior', [ProfilingController::class, 'searchSenior']);

//ActivityLog
Route::get('/activitylog', [UserController::class, 'activityLog']);
// //
// Route::get('/residents', [AdminResidentsController::class, 'search_residents']);




// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

//Announcements 
Route::get('/announcements', [AnnouncementsController::class, 'announcements']);

//Store Announcements
Route::post('/announcementStore', [AnnouncementsController::class, 'announcementStore']);

//Delete Announcements
Route::get('/deleteAnnouncements/{id}', [AnnouncementsController::class, 'deleteAnnouncements']);

//Update Data from Announcements
Route::put('/updateAnouncements/{announcement}', [AnnouncementsController::class, 'updateAnnouncements']);

//File Manager
Route::get('/reports', [FilesController::class, 'reports']);
Route::get('create', [FilesController::class, 'create']);
Route::post('/reports/store', [FilesController::class, 'store']);
Route::get('/deleteFile/{id}', [FilesController::class, 'deletefile']);
Route::get('reports/viewFile', [FilesController::class, 'viewFile']);
Route::get('/download/{file}',[FilesController::class,'download']);

//Financial
Route::get('/financialreport', [FilesController::class, 'financialreport']);
Route::get('create2', [FilesController::class, 'create2']);
Route::post('/financialreport/store2', [FilesController::class, 'store2']);
Route::get('/deleteFile2/{id}', [FilesController::class, 'deletefile2']);

//Blotter Record
Route::get('/blotterrecord', [FilesController::class, 'blotterrecord']);
Route::get('create3', [FilesController::class, 'create3']);
Route::post('/blotterrecord/store3', [FilesController::class, 'store3']);
Route::get('/deleteFile3/{id}', [FilesController::class, 'deletefile3']);

// Route::get('/reports', 'AdminSide\FilesController@reports')->name('admin.reports');
// Route::get('create', 'AdminSide\FilesController@create')->name('admin.create');
// Route::post('/reports/store', 'AdminSide\FilesController@store')->name('admin.store');

