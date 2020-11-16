<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\userController;

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

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/', function () {
    if(Session::has('user')){
        return view('index');
        }else{
            return redirect('/login');
        }
});

Route::get('/add', function () {
    if(Session::has('user')){
    return view('admin/admin_addadmin');
    }else{
        return redirect('/login');
    }
});

//Route::view('/add', 'admin/admin_addadmin');

//login
Route::view('/login', 'admin/admin_login');
Route::post('/login', [userController::class, 'login'])->name('login');

//registering uses
Route::post('/add', [userController::class, 'register']);
