<?php

use App\Http\Middleware\SeriesMid;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticator;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\EpisodesController;

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



// Route::resource('/series', SeriesController::class)
// ->middleware(SeriesMid::class)
// ->except(['show']);

//HOME
Route::get('home', [HomeController::class, 'index'])->name('home.index');

// SERIES
Route::get('series', [SeriesController::class, 'index'])->name('series.index');

// CREATE
Route::get('series/create', [SeriesController::class, 'create'])->name('series.create');
Route::post('series', [SeriesController::class, 'store'])->name('series.store');

// UPDATE
Route::get('series/{series}/edit', [SeriesController::class, 'edit'])->name('series.edit');
Route::put('series/{series}', [SeriesController::class, 'update'])->name('series.update');

// DELETE
Route::delete('series/{series}', [SeriesController::class, 'destroy'])->name('series.destroy');

//Grupo de rotas com middleware
Route::middleware('authenticator')->group(function () {

    Route::get('/', function () {
        return redirect('/series');
    });

    // SEASONS
    Route::get('series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

    //EPISODES
    Route::get('seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
    Route::post('seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');
});

//LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('signin');

//LOGOUT
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

//Register
Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class, 'store'])->name('users.store');

//->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);

//Route::post('/series/destroy/{serie}', [SeriesController::class,
//'destroy'])->name('series.destroy');


/**Route::controller(SeriesController::class)->group(function(){
Route::get('/series', 'index')->name('series.inicio');
Route::get('/series/criar', 'create')->name('series.create');
Route::post('/series/salvar', 'store')->name('series.store');
});
 */
