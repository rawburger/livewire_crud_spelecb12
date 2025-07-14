<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CreateProduct;
use App\Livewire\ShowProduct;
use App\Livewire\EditProduct;
use App\Livewire\IndexProduct;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\Logout;


Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');

Route::middleware(['auth'])->group(function() {

    Route::get('/', fn() => redirect()->route('livewire.index'));

    Route::get('/products', IndexProduct::class)->name('livewire.index');
    Route::get('/products/create', CreateProduct::class)->name('livewire.create-product');
    Route::get('/products/{id}', ShowProduct::class)->name('livewire.show-product');
    Route::get('/products/{id}/edit', EditProduct::class)->name('livewire.edit-product');
    
    
});
