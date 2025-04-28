<?php

use App\Http\Controllers\ApiResourceTestController;
use App\Http\Controllers\ResourceTestController;
use App\Http\Controllers\ShowTestController;
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


// Redirecting

Route::get('/current-user', function() {

 return redirect()->route('profile');

 return to_route('profile');

//  both metghods can be used
});


// Prefix Group

Route::prefix('admin')->group(function() {
    Route::get('users', function () {
        return '/admin/users';
    });
});


// Name Group

Route::name('admin')->group(function() {
    Route::get('/users', function () {
        return '/users'; // BUt the route name is "admin.users"
    })->name('users');
});


// Fallback

Route::fallback(function() {
    // return "Fallback";
    return view('404');
});



// Test / exercise

Route::get('/{pararr1}/test/{pararr2}', function ( float $pararr1, float $pararr2 ) {
    return $pararr1 + $pararr2;
})->whereNumber(['a', 'b']);


//  Controller

// Route::get('/test', [testController::class, 'index']);


// Group Routes By Controller

// Route::controller(testController::class)->group(function(){
//     Route::get('/test', 'index');
//     Route::get('/test2', 'index2');
// });


// Route::get('/test', ShowTestController::class);


// Single Action Controllers

Route::get('/test/invoke', TestController::class);

Route::get('/test', [TestController::class, 'index']);


// Resource Controllers

// Route::resource('/resoources', ResourceTestController::class);

// Route::resource('/resoources', ResourceTestController::class)->except('destroy');

// Route::resource('/resoources', ResourceTestController::class)->only('edit');

// Route::apiResource('/resoources', ResourceTestController::class);

// Route::apiResource('/apiresoources', ApiResourceTestController::class);


Route::apiResources([
    'resources' => ApiResourceTestController::class, 
    'apiresources' => ResourceTestController::class
]);