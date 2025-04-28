<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ElementController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {
    // Routes pour l'apprentissage
    Route::get('/apprendre', [LearningController::class, 'index'])->name('learning.index');
    Route::get('/apprendre/categorie/{category}', [LearningController::class, 'showCategory'])->name('learning.category');
    Route::get('/apprendre/element/{element}', [LearningController::class, 'showElement'])->name('learning.element');

    // Routes pour les catégories (admin et teacher)
    Route::middleware(['role:admin,teacher'])->group(function () {
        Route::resource('categories', CategoryController::class);
    });
    
    // Routes pour les éléments (admin et teacher)
    Route::middleware(['role:admin,teacher'])->group(function () {
        Route::resource('elements', ElementController::class);
    });
    
    // Route pour le tableau de bord
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
