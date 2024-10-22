<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalsController;

// Manual route definitions
Route::get('/animals', [AnimalsController::class, 'index']);    // GET: Retrieve animals
Route::post('/animals', [AnimalsController::class, 'store']);   // POST: Add new animal
Route::put('/animals/{id}', [AnimalsController::class, 'update']); // PUT: Update animal
Route::delete('/animals/{id}', [AnimalsController::class, 'destroy']); // DELETE: Delete animal
