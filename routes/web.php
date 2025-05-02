<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MediaController;


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


Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('home');


Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('/faculty', function () {
    return view('faculty');
})->name('faculty');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/enroll', function () {
    return view('enroll');
})->name('enroll');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');  
});

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {

    Route::get('/gallery', [GalleryController::class, 'showGallery'])->name('gallery');

    Route::get('/admin', function () {
        return view('admin.home'); 
    })->name('admin.home');

    Route::get('/admin/overview', [AdminController::class, 'showOverview'])->name('admin.overview');

    

});

// Display public gallery with both images and videos
Route::get('/gallery', [GalleryController::class, 'showGallery'])->name('gallery');

// Upload gallery form for images
Route::post('/upload-gallery', [GalleryController::class, 'store'])->name('your.upload.route');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/galleryy', function () {
        return view('admin.galleryy'); 
    })->name('admin.galleryy');
    
    
    Route::get('/galleryy/upload', [GalleryController::class, 'uploadPhoto'])->name('admin.galleryy.upload');

    Route::post('/galleryy/upload', [GalleryController::class, 'store'])->name('admin.galleryy.store');

    Route::get('/galleryy/list', [GalleryController::class, 'index'])->name('admin.galleryy.list');
});


// Admin-only gallery routes
// Route::middleware(['auth'])->prefix('admin')->group(function () {
    
//     Route::get('/galleryy', function () {
//         return view('admin.galleryy'); // Correct path for galleryy.blade.php under admin folder
//     })->name('admin.galleryy');
   

//     Route::get('/galleryy/upload', [GalleryController::class, 'showUploadForm'])->name('admin.galleryy.upload');
    
//     Route::post('/galleryy/upload', [GalleryController::class, 'store'])->name('admin.galleryy.store');

//     Route::get('/galleryy/list', [GalleryController::class, 'index'])->name('admin.galleryy.list');

// });

Route::get('/admin/videos/{id}', [VideoController::class, 'show'])->name('admin.video.show');
Route::get('/gallery', [VideoController::class, 'showGalleryItems'])->name('gallery');
Route::get('/video/{id}', [VideoController::class, 'publicShow'])->name('video.detail');

// Admin routes for managing videos
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/video', function () {
        return view('admin.videos'); // Admin view for videos
    })->name('admin.video');

    // Upload form for videos
    Route::get('/video/upload', [VideoController::class, 'showUploadForm'])->name('admin.video.upload');

    // Handle video upload
    Route::post('/video/upload', [VideoController::class, 'store'])->name('admin.video.store');

    // List uploaded videos
    Route::get('/video/list', [VideoController::class, 'index'])->name('admin.video.list');
});
// Route::get('/admin/media', [MediaController::class, 'index'])->name('admin.media');
Route::get('media', function () {
    return view('admin.media');
});
Route::get('admin/media', [MediaController::class, 'showMedia'])->name('admin.media');

Route::get('/', [ContactController::class, 'index'])->name('index');

Route::get('/enroll', [EnrollmentController::class, 'showForm'])->name('enroll.form');
Route::post('/enroll', [EnrollmentController::class, 'enroll'])->name('enroll');
// 1. Form submits here for checkout and Stripe session creation
Route::post('/enroll/checkout', [EnrollmentController::class, 'checkout'])->name('checkout');

// 2. Stripe redirects here after successful payment
Route::get('/payment/success', [EnrollmentController::class, 'paymentSuccess'])->name('payment.success');

// 3. Stripe redirects here if payment is canceled
Route::get('/payment/cancel', [EnrollmentController::class, 'paymentCancel'])->name('payment.cancel');

Route::get('/icard/download', [EnrollmentController::class, 'downloadICard'])->name('icard.download');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contactSubmit');
Route::get('/feedbacks', [App\Http\Controllers\ContactController::class, 'allFeedbacks'])->name('feedback.all');
Route::get('/feedback/all', [ContactController::class, 'allFeedbacks'])->name('all');


// Routes for deleting
Route::delete('admin/user/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
Route::delete('admin/enrollment/{id}/delete', [AdminController::class, 'deleteEnrollment'])->name('admin.enrollment.delete');
Route::delete('admin/contact/{id}/delete', [AdminController::class, 'deleteContact'])->name('admin.contact.delete');
Route::delete('admin/gallery/{id}', [GalleryController::class, 'destroy'])->name('admin.gallery.delete');
Route::delete('/admin/videos/{id}', [VideoController::class, 'destroy'])->name('admin.video.delete');


