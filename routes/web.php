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

Route::get('/', 'ContentsController@home')->name('home');
Route::get('/clients', 'ClientController@index')->name('clients');
Route::get('/clients/new', 'ClientController@newClient')->name('new_client');
Route::post('/clients/new', 'ClientController@newClient')->name('create_client');
Route::get('/clients/{client_id}', 'ClientController@show')->name('show_client');
Route::post('/clients/{client_id}', 'ClientController@modify')->name('update_client');

Route::get('/reservations/{client_id}', 'RoomsController@checkAvailableRooms')->name('check_room');
Route::post('/reservations/{client_id}', 'RoomsController@checkAvailableRooms')->name('check_room');

Route::get('/book/room/{client_id}/{room_id}/{date_in}/{date_out}', 'ReservationsController@bookRoom')->name('book_room');

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