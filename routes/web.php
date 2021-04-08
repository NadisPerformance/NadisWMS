<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CodeBarreController;
use App\Http\Controllers\ConditionnementLogistiqueController;
use App\Http\Controllers\FamilleColisageController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\FamilleQuarantaineController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ModelePreparationController;
use App\Http\Controllers\ModeleSNController;
use App\Http\Controllers\ModeleStockageController;
use App\Http\Controllers\PrixController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VariantController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::resource('/article',ArticleController::class);
Route::resource('/famille',FamilleController::class);
Route::resource('/familleColisage',FamilleColisageController::class);
Route::resource('/marque',MarqueController::class);
Route::resource('/categorie',CategorieController::class);
Route::resource('/modeleStockage',ModeleStockageController::class);
Route::resource('/familleQuarantaine',FamilleQuarantaineController::class);
Route::resource('/prix',PrixController::class);
Route::resource('/variant',VariantController::class);
Route::resource('/societe',SocieteController::class);
Route::resource('/test',TestController::class);
Route::resource('/conditionnementLogistique',ConditionnementLogistiqueController::class);
Route::resource('/codeBarre',CodeBarreController::class);
Route::resource('/modelePreparation',ModelePreparationController::class);
Route::resource('/modeleSN',ModeleSNController::class);
Route::get('/actionFamille',[FamilleController::class,'action'])->name('actionFamille');
Route::get('/actionArticle',[ArticleController::class,'action'])->name('actionArticle');
Route::get('/actionConditionnementLogistique',[ConditionnementLogistiqueController::class,'action'])->name('actionConditionnementLogistique');

