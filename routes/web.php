<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', App\Http\Livewire\Dashboard::class)->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'is_admin',
        'as' => 'admin.',
    ], function () {
        Route::get('properties', [App\Http\Controllers\Admin\PropertyController::class, 'index'])->name('properties.index');
        Route::get('properties/new', [App\Http\Controllers\Admin\PropertyController::class, 'new'])->name('properties.new');
        Route::post('save', [\App\Http\Controllers\Admin\PropertyController::class, 'save'])->name('properties.save');
        Route::get('details/{id}/', [App\Http\Controllers\Admin\PropertyController::class, 'details'])->name('properties.details');
        Route::get('landlord/{id}', [App\Http\Controllers\Admin\PropertyController::class, 'landlord'])->name('properties.landlord');
        Route::get('properties/edit/{id}', App\Http\Livewire\PropertyEdit::class)->name('properties.edit');
        Route::get('invoice', App\Http\Livewire\Invoice::class)->name('invoice.index');
        Route::post('invoice/create', [\App\Http\Controllers\InvoiceController::class, 'create'])->name('invoice.create');
    });

    Route::group(
        [
            'prefix' => 'landlord',
            'as' => 'landlord.',
        ],
        function () {
            Route::get('properties', [App\Http\Controllers\User\PropertyController::class, 'index'])->name('properties.index');
            Route::get('details/{id}/', [App\Http\Controllers\User\PropertyController::class, 'details'])->name('properties.details');
        }
    );
});

Route::group(
    [
        'prefix' => 'properties',
        'as' => 'properties.'
    ],
    function () {
        Route::get('index', [\App\Http\Controllers\PropertyController::class, 'index'])->name('index'); 
        Route::get('details/{id}/', [App\Http\Controllers\User\PropertyController::class, 'details'])->name('properties.details');
    }
);

Route::group(
    [
        'prefix' => 'inbox',
        'as' => 'inbox.',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('chat/messages/{sender_id}/{receiver_id}', App\Http\Livewire\Chat::class)->name('chat.messages');
    }
);

require __DIR__ . '/auth.php';
