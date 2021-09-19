<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});
//Patient End
Route::view('/appointment', 'appointment');
Route::view('/signup', 'register');
Route::view('/home', 'home1');
Route::view('/viewappointment', 'viewappointment');
Route::view('/viewprescription', 'prescription-patient');
Route::view('/pharmacy', 'pharmacy');
Route::view('/cart', 'cart');
Route::view('/invoice', 'invoice');
Route::view('/medication','medication');
Route::view('/quickconsultation', 'quickconsultation');
Route::view('/choosedoctor', 'choosedoctor');
Route::view('/reportupload', 'reportupload');

//Doctor end
Route::view('/prescription', 'prescription');
Route::view('/presMedicine', 'presMedicine');
Route::view('/presTest', 'presTest');
Route::view('/presSurgery', 'presSurgery');
Route::view('/presPdf', 'presPdf');
Route::view('/doctorsview', 'doctorsview');
Route::view('/drviewappointment', 'drviewappointment');
Route::view('/drviewreport', 'drviewreport');
Route::view('/labform', 'labform');
Route::view('/addtest', 'addtest');
Route::view('/testPdf', 'testPdf');


//Admin End
// Route::view('/dashboard', 'admindashboard');
Route::view('/dashboard', 'dashboard');
Route::view('/doctorsa', 'doctorsa');
Route::view('/patientsa', 'patientsa');
Route::view('/appointmentsa', 'appointmentsa');
Route::view('/testsa', 'testsa');
Route::view('/pharmacyadmin','pharmacyadmin');
Route::view('/adminlogin','pharmacylogin');
Route::view('/addmedication','addmedication');
Route::view('/updatemedication','updatemedication');


//Extras
Route::get('/firebase','FirebaseController@index');
Route::view('/patients', 'patients');
Route::view('/doctors', 'doctors');
Route::view('/appointments', 'appointments');
Route::view('/customers', 'customers');
Route::view('/emailtest', 'emailtest');
Route::view('/aboutus', 'aboutus');