<?php

use App\Http\Controllers\Api\NewPasswordController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CategorieController;
use App\Http\Controllers\Api\V1\ContactController;
use App\Http\Controllers\Api\V1\EntrepriseController;
use App\Http\Controllers\Api\V1\LocalisationController;
use App\Http\Controllers\Api\V1\StatistiqueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('v1/entreprises', [EntrepriseController::class, 'index']); //done
Route::get('v1/entreprises/{entreprise}', [EntrepriseController::class, 'show']); //done
Route::get('v1/search', [EntrepriseController::class, 'search']);  //done


Route::get('v1/contacts/{contact}', [ContactController::class, 'show']); //done
Route::get('v1/contacts', [ContactController::class, 'index']); //done


Route::get('v1/statistiques/{statistique}', [StatistiqueController::class, 'show']);
Route::get('v1/statistiques', [StatistiqueController::class, 'index']);


Route::get('v1/categories/{categorie}', [CategorieController::class, 'show']);//done
Route::get('v1/categories', [CategorieController::class, 'index']);//done


Route::get('v1/localisations/{localisation}', [LocalisationController::class, 'show']);//done
Route::get('v1/localisations', [LocalisationController::class, 'index']);//done


Route::post('v1/register_user', [AuthController::class, 'register_user']);//done
Route::post('v1/login', [AuthController::class, 'login']);



Route::group(['middleware' => ['auth:sanctum']],function(){
    Route::post('v1/entreprises', [EntrepriseController::class, 'store']); //done
    Route::put('v1/entreprises/{entreprise}', [EntrepriseController::class, 'update']); //done
    Route::delete('v1/entreprises/{entreprise}', [EntrepriseController::class, 'destroy']);  //done
    Route::patch('v1/entreprises/{entreprise}/toggle-apparaitre', [EntrepriseController::class, 'toggleApparaitre']);

    Route::post('v1/contacts', [ContactController::class, 'store']); //done
    Route::put('v1/contacts/{contact}', [ContactController::class, 'update']); //done
    Route::delete('v1/contacts/{contact}', [ContactController::class, 'destroy']); //done

    Route::post('v1/statistiques', [StatistiqueController::class, 'store']);
    Route::put('v1/statistiques/{statistique}', [StatistiqueController::class, 'update']);
    Route::delete('v1/statistiques/{statistique}', [StatistiqueController::class, 'destroy']);

    Route::post('v1/localisations', [LocalisationController::class, 'store']);//done
    Route::put('v1/localisations/{localisation}', [LocalisationController::class, 'update']);//done
    Route::delete('v1/localisations/{localisation}', [LocalisationController::class, 'destroy']);//done

    Route::post('v1/logout', [AuthController::class, 'logout']);
});



Route::middleware(['auth:sanctum', 'checkRole:admin'])->group(function () {
    Route::post('v1/register_admin', [AuthController::class, 'register_admin']);//done

    Route::post('v1/categories', [CategorieController::class, 'store']);//done
    Route::put('v1/categories/{categorie}', [CategorieController::class, 'update']);//done
    Route::delete('v1/categories/{categorie}', [CategorieController::class, 'destroy']);//done
});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


