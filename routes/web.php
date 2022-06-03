<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
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

Route::get('/produtos',[ProdutoController::class,'index'])->name('produtos.index');
Route::get('/categorias',[CategoriaController::class,'index'])->name('categorias.index');

Route::get('/', function () {
    return view('index');
})->name('home');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/cadastro/produtos',
                                [ProdutoController::class,'create'])
                                ->name('produtos.create')
                                ->middleware('auth');
Route::get('/cadastro/categorias',
                                [CategoriaController::class,'create'])
                                ->name('categorias.create')
                                ->middleware('auth');

Route::post('/cadastro/categorias/store',
                                        [CategoriaController::class,'store'])
                                        ->name('categorias.store')
                                        ->middleware('auth');
Route::post('/cadastro/produtos/store',
                                        [ProdutoController::class,'store'])
                                        ->name('produtos.store')
                                        ->middleware('auth');


Route::get('/remove/produtos/{id}',
                                        [ProdutoController::class,'destroy'])
                                        ->name('produtos.destroy')
                                        ->middleware('auth');

Route::get('/remove/categoria/{id}',
                                        [CategoriaController::class,'destroy'])
                                        ->name('categorias.destroy')
                                        ->middleware('auth');
Route::get('/edit/produtos/{id}',
                                        [ProdutoController::class,'show'])
                                        ->name('produtos.show')
                                        ->middleware('auth');

Route::post('/edit/produtos/update',
                                        [ProdutoController::class,'update'])
                                        ->name('produtos.update')
                                        ->middleware('auth');