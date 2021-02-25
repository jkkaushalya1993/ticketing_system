<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/tickets/','App\Http\Controllers\TicketController@index')->name('tickets.index');
Route::get('/tickets/remove/{ticket}','App\Http\Controllers\TicketController@remove')->name('tickets.remove');
Route::post('/tickets/addnew','App\Http\Controllers\TicketController@store')->name('tickets.store');
Route::get('/tickets/addnew','App\Http\Controllers\TicketController@addnew')->name('tickets.addnew');
Route::get('/tickets/{ticket}','App\Http\Controllers\TicketController@display')->name('tickets.display');
Route::post('/tickets/{ticket}','App\Http\Controllers\TicketController@update')->name('tickets.update');
Route::post('/tickets/remove/{ticket}','App\Http\Controllers\TicketController@destroy')->name('tickets.destroy');



// Route::post('/tickets/create1','TicketController@store')->name('tickets.store');
// #Route::post('/tickets/{ticket}','TicketController@update')->name('tickets.update');
// Route::get('/tickets/delete/{ticket}','TicketController@delete')->name('tickets.delete');
// Route::post('/tickets/delete/{ticket}','TicketController@destroy')->name('tickets.destroy');
//Route::get('/tickets/{ticket}','TicketController@show')->name('tickets.show');