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
use App\Http\Controllers\LigneModeleSNController;
use App\Http\Controllers\FamilleSNController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AdresseController;
use App\Http\Controllers\TierController;
use App\Http\Controllers\ContacteController;
use App\Http\Controllers\MagasinController;
use App\Http\Controllers\EmplacementController;
use App\Http\Controllers\FamilleSupportController;
use App\Http\Controllers\SecteurController;
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
Route::resource('/ligneModeleSN',LigneModeleSNController::class);
Route::resource('/familleSN',FamilleSNController::class);
Route::resource('/site',SiteController::class);
Route::resource('/adresse',AdresseController::class);
Route::resource('/tier',TierController::class);
Route::resource('/contacte',ContacteController::class);
Route::resource('/magasin',MagasinController::class);
Route::resource('/emplacement',EmplacementController::class);
Route::resource('/familleSupport',FamilleSupportController::class);
Route::resource('/secteur',SecteurController::class);
Route::get('/actionFamille',[FamilleController::class,'action'])->name('actionFamille');
Route::get('/actionFamilleColisage',[FamilleColisageController::class,'action'])->name('actionFamilleColisage');
Route::get('/actionArticle',[ArticleController::class,'action'])->name('actionArticle');
Route::get('/actionConditionnementLogistique',[ConditionnementLogistiqueController::class,'action'])->name('actionConditionnementLogistique');
Route::get('/actionCodeBarre',[CodeBarreController::class,'action'])->name('actionCodeBarre');
Route::get('/actionModeleSN',[ModeleSNController::class,'action'])->name('actionModeleSN');
Route::get('/actionFamilleSN',[FamilleSNController::class,'action'])->name('actionFamilleSN');
Route::get('/actionLigne',[LigneModeleSNController::class,'action'])->name('actionLigne');
Route::get('/actionVariant',[VariantController::class,'action'])->name('actionVariant');
Route::get('/actionSite',[SiteController::class,'action'])->name('actionSite');
Route::get('/actionMagasin',[MagasinController::class,'action'])->name('actionMagasin');
Route::get('/actionEmplacement',[EmplacementController::class,'action'])->name('actionEmplacement');
Route::get('/actionSecteur',[SecteurController::class,'action'])->name('actionSecteur');
Route::get('/actionFamilleSupport',[FamilleSupportController::class,'action'])->name('actionFamilleSupport');
Route::get('/actionAdresse',[AdresseController::class,'action'])->name('actionAdresse');
Route::get('/actionTier',[TierController::class,'action'])->name('actionTier');
Route::get('/actionContacte',[ContacteController::class,'action'])->name('actionContacte');