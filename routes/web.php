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
Route::get('/firebase','FirebaseController@index');
Route::view('/patients', 'patients');
Route::view('/appointment', 'appointment');
Route::view('/signup', 'register');
Route::view('/home', 'home1');
Route::view('/viewappointment', 'viewappointment');
Route::view('/pharmacy', 'pharmacy');
Route::view('/cart', 'cart');
Route::view('/pharmacyadmin','pharmacyadmin');
Route::view('/pharmacylogin','pharmacylogin');
Route::view('/medication','medication');
Route::view('/addmedication','addmedication');
Route::view('/updatemedication','updatemedication');


Route::view('/reportupload', 'reportupload');
Route::view('/prescription', 'prescription');
Route::view('/presMedicine', 'presMedicine');
Route::view('/presTest', 'presTest');
Route::view('/presSurgery', 'presSurgery');
Route::view('/presPdf', 'presPdf');
Route::view('/doctorsView', 'doctorsView');
Route::view('/drviewappointment', 'drviewappointment');
Route::view('/drviewreport', 'drviewreport');

Route::view('/labform', 'labform');
Route::view('/addtest', 'addtest');
Route::view('/testPdf', 'testPdf');

Route::view('/quickconsultation', 'quickconsultation');