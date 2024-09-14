<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Colecciones
    Route::get('/collections', [CollectionController::class, 'index'])->name('collections.index');
    Route::get('/collections/create', [CollectionController::class, 'create'])->name('collections.create');
    Route::post('/collections/store', [CollectionController::class, 'store'])->name('collections.store');
    Route::get('/collections/{collection}/edit', [CollectionController::class, 'edit'])->name('collections.edit');
    Route::put('/collections/{collection}', [CollectionController::class, 'update'])->name('collections.update');
    Route::get('/collections/{collection}/show', [CollectionController::class, 'show'])->name('collections.show');
    Route::delete('/collections/{collection}', [CollectionController::class, 'destroy'])->name('collections.destroy');


    // Gestor de campos
    Route::prefix('fields')->name('fields.')->group(function () {
        Route::get('/', [FieldController::class, 'index'])->name('index');
        Route::get('/create', [FieldController::class, 'create'])->name('create');
        Route::post('/store', [FieldController::class, 'store'])->name('store');
        Route::get('/{field}/edit', [FieldController::class, 'edit'])->name('edit');
        Route::put('/{field}', [FieldController::class, 'update'])->name('update');
        Route::delete('/{field}', [FieldController::class, 'destroy'])->name('destroy');
        Route::get('/{field}/subfields', [FieldController::class, 'manageSubfields'])->name('subfields.manage');
    });
    
});

require __DIR__.'/auth.php';
