<?php

use Illuminate\Support\Facades\Route;

// Route::view('/', 'pages.posts.index')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::livewire('/', 'pages::posts.index')->name('home');

Route::livewire('/posts/{id}', 'pages::posts.show')->name('posts-show');

require __DIR__.'/settings.php';
