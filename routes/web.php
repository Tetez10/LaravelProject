<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
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

Route::resource('articles', ArticleController::class);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    // Route pour afficher tous les utilisateurs (accessible uniquement par l'administrateur)
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
});

Auth::routes();

Route::resource('faq-categories', FaqCategoryController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/faq', [FaqCategoryController::class, 'index'])->name('faq');
Route::resource('faq-questions', FaqQuestionController::class)->middleware('auth'); // Ajout de la ressource pour le contrôleur FaqQuestionController
Route::post('/faq-questions/{faqQuestion}/answer', [FaqQuestionController::class, 'answer'])->name('faq-questions.answer');
Route::get('/faq-question/create', [FaqQuestionController::class, 'create'])->name('faq-question.create');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
