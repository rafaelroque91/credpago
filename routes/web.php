<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlCadastroController;
use App\Http\Controllers\UrlMonitoraController;

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

Route::middleware(['auth'])->group(function () {

  Route::get('/', function () {
    return view('dashboard');
  })->name('index');

  Route::group(['prefix' => 'url'], function() {                
    Route::get('/cadastro/{urlUser:id?}',[UrlCadastroController::class,'cadastrar'])->name('url-cadastro');            
    Route::delete('/excluir',[UrlCadastroController::class,'delete'])->name('url-delete');    
    Route::get('/lista',[UrlCadastroController::class,'index'])->name('url-lista');    
    Route::post('/salvar',[UrlCadastroController::class,'salvar'])->name('url-salvar');   
    Route::get('/refresh',[UrlCadastroController::class,'refresh'])->name('url-refresh');          
  });

  Route::group(['prefix' => 'url-monitora'], function() {                          
    Route::get('/lista/{url_id?}',[UrlMonitoraController::class,'index'])->name('url-monitora-lista');            
    Route::get('/refresh/{url_id?}',[UrlMonitoraController::class,'refresh'])->name('url-monitora-refresh');          
    Route::get('/detalhes/{urlmonitora:id}',[UrlMonitoraController::class,'detalhes'])->name('url-monitora-detalhes');          
  });
       
}); 

require __DIR__.'/auth.php';
