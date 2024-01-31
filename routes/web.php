<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Middleware\SeriesMid;
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
        return redirect('/series');
    });

    // Route::resource('/series', SeriesController::class)
    // ->middleware(SeriesMid::class)
    // ->except(['show']);

    // SERIES
    Route::get('series', [SeriesController::class, 'index'])->name('series.index');

    // create
    Route::get('series/create', [SeriesController::class, 'create'])->name('series.create');
    Route::post('series', [SeriesController::class, 'store'])->name('series.store');

    // update
    Route::get('series/{series}/edit', [SeriesController::class, 'edit'])->name('series.edit');
    Route::put('series/{series}', [SeriesController::class, 'update'])->name('series.update');

    // delete
    Route::delete('series/{series}', [SeriesController::class, 'destroy'])->name('series.destroy');

    // SEASONS
    Route::get('series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

    //EPISODES
    Route::get('seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
    Route::post('seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');
   
    //->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);

    //Route::post('/series/destroy/{serie}', [SeriesController::class,
    //'destroy'])->name('series.destroy');


/**Route::controller(SeriesController::class)->group(function(){
    Route::get('/series', 'index')->name('series.inicio');
    Route::get('/series/criar', 'create')->name('series.create');
    Route::post('/series/salvar', 'store')->name('series.store');
});
 */
