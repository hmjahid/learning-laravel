<?php

use App\Http\Controllers\testController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $person = [
        'name' => 'John Doe', 'age' => 30, 'email' => 'john@example.com'
    ];

    // $aboupageurl = route('about');
    // dd($aboupageurl);

    $producturl = route('product.view', ['lang' => 'en', 'id' => 1]);
    dd($producturl);

    // dump($person);
    // dd($person); 
    return view('welcome');
});

// Route::get('/about', function () {
//     return view('about');
// });

// Route::view( '/about', 'about');

Route::view( '/about-us', 'about')->name('about');

Route::get('/contact/{name}', function ( string $name) {
    return "My name is =$name";
});


Route::get('/service/{type?}', function(string $type = null) {
    return "The service is=$type";
});

Route::get('/course/{id}', function(string $id) {
    return "The course id is=$id";
})->whereNumber('id');

Route::get('/search/{search}', function(string $search) {
    return $search;
})->where('serach', '.+');

Route::get('/p/{lang}/course/{id}', function(string $id) {
    return "The course id is=$id";
})->name('product.view');


Route::get('/user/profile', function () {

})->name('profile');


Route::get('/current-user', function() {

 return redirect()->route('profile');

 return to_route('profile');

//  both metghods can be used
});


Route::prefix('admin')->group(function() {
    Route::get('users', function () {
        return '/admin/users';
    });
});


Route::name('admin')->group(function() {
    Route::get('/users', function () {
        return '/users'; // BUt the route name is "admin.users"
    })->name('users');
});



Route::fallback(function() {
    // return "Fallback";
    return view('404');
});



// Test / exercise

Route::get('/{pararr1}/test/{pararr2}', function ( float $pararr1, float $pararr2 ) {
    return $pararr1 + $pararr2;
})->whereNumber(['a', 'b']);





Route::get('test', [testController::class, 'index']);
