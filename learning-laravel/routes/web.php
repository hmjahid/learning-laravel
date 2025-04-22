<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $person = [
        'name' => 'John Doe', 'age' => 30, 'email' => 'john@example.com'
    ];

    dump($person);
    // dd($person); 
    return view('welcome');
});

// Route::get('/about', function () {
//     return view('about');
// });

Route::view( '/about', 'about');
