<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //eloquent ORM
    // $users = User::all();

    //query builder
    $users = DB::table('users')->get();

    return view('dashboard',compact('users'));
})->name('dashboard');

//category 
Route::get("/category/all",[CategoryController::class,'AllCat'])->name('all.category');
//save category
Route::post("/category/add",[CategoryController::class,'AddCat'])->name('store.category');
