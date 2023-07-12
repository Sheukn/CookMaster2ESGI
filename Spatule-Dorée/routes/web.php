<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CertificationController;

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
})->name('welcome');


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('can:manage-users')->prefix('admin')->name('admin.')->group(function () {
    // Routes pour la gestion des utilisateurs
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{user}/ban', [UserController::class, 'ban'])->name('users.ban');

    // Routes pour la gestion des événements
    Route::get('/events', [EventsController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventsController::class, 'create'])->name('events.create');
    Route::post('/events', [EventsController::class, 'store'])->name('events.store');
    Route::get('/events/{event}', [EventsController::class, 'show'])->name('events.show');
    Route::get('/events/{event}/edit', [EventsController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventsController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventsController::class, 'destroy'])->name('events.destroy');
});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile/{user}', [ProfileController::class, 'updateProfile'])->name('profile.update');
});


Route::middleware('auth')->group(function () {
    Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('plans/{plan}', [PlanController::class, 'show'])->name('plans.show');
    Route::post('/subscriptions', [PlanController::class, 'store'])->name('store.subscription');
    Route::get('/subscription/checkout/{plan}', [PlanController::class, 'checkout'])->name('subscription.checkout');
    Route::get('/subscription/success', [PlanController::class, 'success'])->name('subscription.success');
});

Route::get('/formation/create', [FormationController::class, 'create'])->name('formation.create');
Route::post('/formation/store', [FormationController::class, 'store'])->name('formation.store');
Route::get('/formation/{formation}', [FormationController::class, 'index'])->name('formation.index');
Route::get('/formation/submit/{formation}', [FormationController::class, 'submit'])->name('formation.submit');
Route::get('/certification', [CertificationController::class, 'index'])->name('certifications.index');
Route::get('/certification/download/{certification}', [CertificationController::class, 'download'])->name('certifications.download');

Route::get('/my-events', [EventsController::class, 'myEvents'])->name('events.myEvents');



// Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
// Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Route::get('/login', [LoginController::class, 'create'])->name('login.create');
// Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Route::middleware('auth')->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// });

// Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
//     Route::get('/users', [UserController::class, 'index'])->name('users.index');
//     Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
//     Route::post('/users', [UserController::class, 'store'])->name('users.store');
//     Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
//     Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
//     Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
//     Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
//     Route::post('/users/{id}', [UserController::class, 'ban'])->name('users.ban');
// });



//On affiche une page d'avertissement au cas ou l'user n'a pas vérifié son email
// Route::get('/emails/verify', function () {
//     return view('emails.verify');
// })->middleware('auth')->name('verification.notice');

// //On traite la vérification de l'email
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// //En cas de non reception de l'email de vérification
// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();

//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');