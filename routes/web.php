<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompositoresController;
use App\Http\Controllers\PartiturasController;

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
    //return redirect('compositores/');
//});

Route::get('/',function () {
   return view('home');
});
Route::get('compositores/buscar',[CompositoresController::class,'buscar']);
Route::resource('compositores',CompositoresController::class);

Route::get('partituras/buscar',[PartiturasController::class,'buscar']);
Route::resource('partituras',PartiturasController::class);


