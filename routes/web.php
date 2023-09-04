<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\OfferCategoryController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TitheController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // membros 
    Route::get('membro/cadastrar', [MemberController::class, 'create'])->name('member.create');
    Route::get('membro/procurar', [MemberController::class, 'search'])->name('member.search');
    Route::post('membro/inserir', [MemberController::class, 'store'])->name('member.store');

    // Dizimos
    Route::get('dizimo/listarMembros', [TitheController::class, 'memberList'])->name('tithe.list');
    Route::get('dizimo/cadastrar', [TitheController::class, 'create'])->name('tithe.create');
    Route::post('dizimo/inserir', [TitheController::class, 'store'])->name('tithe.store');

    // Ofertas
    Route::get('oferta/cadastrar', [OfferController::class, 'create'])->name('offer.create');
    Route::post('oferta/inserir', [OfferController::class, 'store'])->name('offer.store');

    // categorias de ofertas
    Route::prefix('categoria-de-oferta/inserir')->group(
        fn () =>
        Route::get('/listar', [OfferCategoryController::class, 'index'])->name('offerCategory.index'),
        Route::post('/inserir', [OfferCategoryController::class, 'store'])->name('offerCategory.store')
    );
});

require __DIR__ . '/auth.php';
