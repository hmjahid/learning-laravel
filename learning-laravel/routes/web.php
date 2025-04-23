<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $person = [
        'name' => 'John Doe', 'age' => 30, 'email' => 'john@example.com'
    ];

    // dump($person);
    // dd($person); 
    return view('welcome');
});

// Route::get('/about', function () {
//     return view('about');
// });

Route::view( '/about', 'about');

Route::get('/contact/{name}', function ( string $name) {
    return "My name is =$name";
});


Route::get('/service/{type?}', function(string $type = null) {
    return "The service is=$type";
});

Route::get('/course/{id}', function(string $id) {
    return "The course id is=$id";
})->whereNumber('id');