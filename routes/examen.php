<?php

use App\Http\Controllers\Examen\ExamenController;
use Illuminate\Support\Facades\Route;


Route::get('/examen', [ExamenController::class,'index'])->name('examen.index');
