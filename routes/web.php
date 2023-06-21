<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MessageController;

use App\Http\Controllers\FaqCategoryController;
use App\Http\Controllers\FaqQuestionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
Route::get('/users', [UserController::class, 'index'])->name('users.index');


Route::get('/admin/create-user', [UserController::class, 'create'])->name('users.create');
Route::post('/admin/store-user', [UserController::class, 'store'])->name('users.store');


});

Auth::routes();


// Articles
Route::resource('articles', ArticleController::class)->withoutMiddleware('auth');

// FAQ Categories
Route::resource('faq-categories', FaqCategoryController::class)->except(['show']);
Route::get('/faq-categories/{faqCategory}', [FaqCategoryController::class, 'show'])->name('faq-categories.show');
Route::get('/faq', [FaqCategoryController::class, 'index'])->name('faq');

// FAQ Questions
Route::resource('faq-questions', FaqQuestionController::class)->middleware('auth')->except(['create', 'store']);
Route::post('/faq-questions/{faqQuestion}/answer', [FaqQuestionController::class, 'answer'])->name('faq-questions.answer');
Route::get('/faq-question/create', [FaqQuestionController::class, 'create'])->name('faq-question.create');
Route::post('/faq-questions', [FaqQuestionController::class, 'store'])->name('faq-questions.store');

//

Route::get('/messages', [MessageController::class, 'index'])->middleware('auth')->name('message.index');

// Route pour soumettre le formulaire de contact et enregistrer le message
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send')->middleware('guest');


// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.submit');

// Profile
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');


//about

Route::get('/about', function () {
    return view('aboutpage');
})->name('about');

// welcome 
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

