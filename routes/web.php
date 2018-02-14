<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

    Route::get('/', function () {
        return view('users.login');
    })->name('home')->middleware('guest');

    Route::post('/','LoginController@login')->name('login');


    Route::group(['middleware' => 'auth'], function () {
        
        Route::get('/signout','LoginController@logOut')->name('logout');

        Route::get('/dashboard','UserController@dashboard' )->name('dashboard');

        Route::get('/view/staffs','UserController@viewUsers')->name('view_users');

        Route::get('/update/staff','UserController@updateUser')->name('update_user');

        Route::get('/create/staff','UserController@createUser')->name('create_user');
           
        Route::get('/clients/view','UserController@viewClients')->name('clients');
       
        Route::get('/clients/create','UserController@createClient')->name('create_clients');
        
        Route::get('/clients/update','UserController@updateClient')->name('updateClient');

        Route::get('/update/staff/department','UserController@updateDept')->name('system_update_user_department');    
      
        Route::get('/save/staff/department','UserController@postUserDept')->name('saveStaffDept');

        Route::get('/departments/view','UserController@viewUserDept')->name('view_user_dept');
     
        Route::get('/ticket/create','Usercontroller@createTicket')->name('createTicket');

        Route::get('/ticket/update','Usercontroller@updateTicket')->name('updateTicket');

        Route::get('/ticket/view/{id}','UserController@viewTicket')->name('edit_ticket');

        Route::get('/ticket/delete','UserController@deleteTicket')->name('deleteTicket');

    
   });