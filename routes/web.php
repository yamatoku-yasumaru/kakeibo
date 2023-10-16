<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('/', [RecordsController::class, 'index'])->name('home'); 
        Route::post('records.create',[RecordsController::class, 'create'])->name('records.create');
        Route::
        Route::post('/records/index', [RecordsController::class, 'scheduleGet'])->name('schedule-get');
    });                                                                                         
    
    Route::resource('users', UsersController::class, ['only' => ['index', 'show']]);
    Route::resource('records', RecordsController::class, ['only' => ['store', 'destroy']]);
    Route::resource('categories', CategoriesController::class, ['only' => ['store', 'destroy']]);
});*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('home');




require __DIR__.'/auth.php';


/*Route::get('/', [RecordsController::class, 'index']);*/

Route::resource('records', RecordsController::class);
Route::resource('categories', CategoriesController::class);
Route::resource('users', UsersController::class);

