<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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


Route::group([
    'as' => 'product.',
    'controller' => ProductController::class,
], function () {
    Route::get('/', 'index')->name('index');

    Route::post('/datatable', 'datatable')->name('datatable');

    Route::get('{id}/ver', 'show')->name('show');

    Route::get('/cadastrar', 'create')->name('create');

    Route::post('/', 'store')->name('store');

    Route::get('{id}/editar', 'edit')->name('edit');

    Route::put('{id}/editar', 'update')->name('update');

    Route::delete('{id}/excluir', 'delete')->name('delete');
});

require __DIR__.'/auth.php';
