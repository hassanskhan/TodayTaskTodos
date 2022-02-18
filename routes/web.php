<?php

use App\Http\Controllers\TodosController;
use App\Models\Todo;
use Illuminate\Support\Facades\Route;

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
Route::get('/todos',function(){

    $todos=Todo::all();
    return  view('Todos.index')->with(['Todos'=>$todos]);
    //view('Todos.index');
})->name('todos.index');


Route::get('/todos/create',[TodosController::class,'create']);
Route::post('/todos/create',[TodosController::class,'store']);
Route::get('/todos/{edit}',[TodosController::class,'edit']);
Route::post('/todos/{edit}',[TodosController::class,'update']);
Route::get('/delete/{id}',[TodosController::class,'delete']);
Route::post('/delete/{id}',[TodosController::class,'delete']);


Route::put('/complete/{id}',[TodosController::class,'complete'])->name('todos.complete');
