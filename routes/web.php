<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $person = [
        'name' => 'Hanif',
        'email' => 'hanifsmurf@gmail.com'
    ];
    return view('welcome');
});

// Route::get('/about', function () {
//     return view('about');
// });

// same
Route::view('/about', 'about');

// simple route
Route::get('/product/{id}', function (string $id) {
    return "Product ID=$id";
});

// more complex rute
Route::get(
    "{lang}/product/{id}/review/{reviewId}",
    function (string $lang, string $id, string $reviewId) {
        return "Product ID=$lang,$id,$reviewId";
    }
);

Route::get("/productnya/{cat?}/", function (string $category = null) {
    return "Product $category";
});

Route::get("/cartype/{typ?}/", function (string $type = null) {
    return "Product $type";
})->whereAlpha('typ');

// regex things
Route::get('/user/{username}', function (string $uname) {
    return "lower case";
})->where('username', '[a-z]+');

// regex with 2 param things
Route::get('/lang/{lang}/product/{id}', function () {
    return 'memenuhi';
})->where(['lang' => '[a-z]{2}', 'id' => '\d{4,}']);

// karakter slash dilarang
Route::get('/search/{search}', function (string $search) {
    return $search;
});

// memperbolehkan semua karakter
Route::get('/cari/{search}', function (string $search) {
    return $search;
})->where('search', '.+');

// named route
Route::view('/about-us', 'about')->name('about');

Route::get('/named', function () {
    $aboutUrl = route('about');
    return $aboutUrl;
});

Route::get('/{lang}/product/{id}', function () {

})->name("product.view");

Route::get('/product_param', function () {
    $productUrl = route("product.view", ['lang' => 'id', 'id' => 3]);
    return $productUrl;
});

Route::get('/users/profile', function () {
    return "Hanif Aulia Kusuma";
})
    ->name('profile')
;

Route::get('/current-user', function () {
    // return redirect()->route('profile');
    return to_route('profile');
});

Route::prefix('/admin')->group(function () {
    Route::get('/users', function () {
        return "/admin/users";
    });
});

// route di bawah memilki nama admin.users
Route::name('admin.')->group(function () {
    Route::get('/users', function () {
        return '/users';
    })->name('users');
});

Route::fallback(function () {
    return "Halaman tidak tersedia";
});

// sum route
Route::get('/math/first/{first}/second/{second}', function (int $first, int $second) {
    $sum = $first + $second;
    return $sum;
})->whereNumber(['first', 'second']);


// START FORM HERE

Route::get('/car', [App\Http\Controllers\CarController::class, 'index']);

Route::controller(App\Http\Controllers\CarController::class)->group(function () {
    Route::get('/car', 'index');
    Route::get('/my-car', 'my_car');
});

Route::get('/show-car', App\Http\Controllers\ShowCarController::class);

// Route::resource('/products', App\Http\Controllers\ProductController::class);

// Route::resource('/products', App\Http\Controllers\ProductController::class)
//     ->except(['destroy'])
// ;

// Route::resource('/products', App\Http\Controllers\ProductController::class)
//     ->only(['index', 'show'])
// ;

// Route::apiResource('/products', App\Http\controllers\ProductController::class);

// api resource pun bisa dirangkap menjadi berikut

Route::apiResources([
    'truck' => App\Http\Controllers\TruckController::class,
    'product' => App\Http\Controllers\ProductController::class,
]);

Route::controller(App\Http\Controllers\MathController::class)->group(function () {
    Route::get('/sum/{f}/{s}', 'sum')->whereNumber(['f', 's']);
    Route::get('/substract/{f}/{s}', 'substract')->whereNumber(['f', 's']);
});