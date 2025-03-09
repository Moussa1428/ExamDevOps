<?php

use App\Http\Controllers\CoursController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfController;
use Illuminate\Support\Facades\Route;


Route::resource('profs', ProfController::class);

Route::resource('cours', CoursController::class);

Route::resource('etudiants', EtudiantController::class);
