<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = App\Models\Post::all();
    return view('blog.index', compact('posts'));
})->name('home');

Route::get('/dashboard', function () {
    $posts = App\Models\Post::all();
    return view('dashboard', compact('posts'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Route untuk CRUD postingan (tanpa index)
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])
    ->middleware('auth')
    ->name('posts.create');

Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])
    ->middleware('auth')
    ->name('posts.store');

Route::get('/posts/{id}/edit', [App\Http\Controllers\PostController::class, 'edit'])
    ->middleware('auth')
    ->name('posts.edit');

Route::put('/posts/{id}', [App\Http\Controllers\PostController::class, 'update'])
    ->middleware('auth')
    ->name('posts.update');

Route::delete('/posts/{id}', [App\Http\Controllers\PostController::class, 'destroy'])
    ->middleware('auth')
    ->name('posts.destroy');

// Route untuk detail posts (tetap pakai /blog untuk publik)
// Route show sudah ada di /blog/{id}

Route::get('/blog', function () {
    $posts = App\Models\Post::all();
    return view('blog.index', compact('posts'));
})->name('blog.index');

Route::get('/blog/{id}', function ($id) {
    $post = App\Models\Post::findOrFail($id);
    return view('blog.show', compact('post'));
})->name('blog.show');

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');

require __DIR__.'/auth.php';