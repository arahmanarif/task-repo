<?php

use App\Http\Controllers\Api\LedgerController;
use App\Http\Controllers\Api\ProductController;
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

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('ledger/{id}', [LedgerController::class, 'ledger'])->name('products.ledger');
Route::get('calculate/stock/{id}', [LedgerController::class, 'calculateStock'])->name('ledger.calculate.stock');
