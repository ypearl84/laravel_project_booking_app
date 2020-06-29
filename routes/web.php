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

Route::get('/', 'ContentsController@home');
Route::get('/clients', 'ClientController@index');
Route::get('/clients/new', 'ClientController@newClient');
Route::post('/clients/new', 'ClientController@create');
Route::get('/clients/{client_id}', 'ClientController@show'); 
Route::post('/clients/{client_id}', 'ClientController@modify');

Route::get('/reservations/{client_id}', 'RoomsController@checkAvailableRooms');
Route::post('/reservations/{client_id}', 'RoomsController@checkAvailableRooms');

Route::get('/book/room/{client_id}/{room_id}/{date_in}/{date_out}', 'ReservationsController@bookRoom');

Route::get('/about', function () { 
    // return '<h3>About..</h3>';
    $response_arr = [];
    $response_arr['author'] = 'BP';
    $response_arr['version'] = '0.1.1';

    return $response_arr;
});

Route::get('/home', function () {
    $data = [];
    $data ['version'] = '0.1.1';

    return view('welcome', $data); 
});

Route::get('/di', 'ClientController@di');

Route::get('/facades/db', function () { 

    return DB::select('Select * from table');
});

Route::get('/facades/encrypt', function () { 

    return Crypt::encrypt('1234');
});

Route::get('/facades/decrypt', function () { 

    return Crypt::decrypt('eyJpdiI6Ijl1NFMxcG9lT1lIYXRyNzY0anR1OVE9PSIsInZhbHVlIjoiT3NCVnpqZUcvSStzVWdIa1FOY09pdz09IiwibWFjIjoiYmE1YzUxM2RkYTBjZWUxNjcxMDBlMWIzOTJmMDhhMDZhMTg1NTU1NjUyNjI2MDI4MTRmZjg1NjNjOWE4YTc2MSJ9');
});