<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostCommentsController;
use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('authors/author:name', function(User $author) {
    return view('posts.index', [
        'posts' => $author->posts
    ]);
});

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

// file upload routes
Route::get('/uploads', [UploadController::class, 'index']); //->middleware(['web', 'can:viewAny,App\Models\Upload']);
Route::get('/uploads/create', [UploadController::class, 'create'])->middleware(['auth', 'verified', 'can:create,App\Models\Upload']);
Route::post('/uploads', [UploadController::class, 'store'])->middleware(['auth', 'verified', 'can:create,App\Models\Upload']);
Route::get('/uploads/{upload}/edit', [UploadController::class, 'edit'])->middleware(['auth', 'verified', 'can:update,upload']);
Route::get('/uploads/{upload}/{orginalName?}', [UploadController::class, 'show']); //->middleware('can:view,upload');
Route::delete('/uploads/{upload}', [UploadController::class, 'destroy'])->middleware(['auth', 'verified', 'can:delete,upload']);
Route::put('/uploads/{upload}', [UploadController::class, 'update'])->middleware(['auth', 'verified', 'can:update,upload']);
Route::get('/uploads/{upload}', [UploadController::class, 'showUpload'])->middleware(['auth', 'verified', 'can:update,upload']);
Route::get('/uploads/{upload}/file/{orginalName?}', [UploadController::class, 'file']); //->middleware('can:view,upload');

// newsletter routes
Route::post('newsletter', NewsletterController::class);

// admin routes
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');
Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin');
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');
