<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LedgerController;
use App\Http\Controllers\ProductController;

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

Route::get('test', function () {

    $ledgerEntries =  ProductLedger::with(['product:id,name', 'purchase:id,invoice', 'sale:id,invoice'])
        ->where('product_ledgers.product_id', 68)->get();

    $tempIn = 0;
    $tempOut = 0;
    $tempCurrentStock = 0;
    foreach ($ledgerEntries as $entry) {
        $tempIn += $entry->purchase_id ? $entry->stock : 0;
        $entry->stock_in = $entry->purchase_id ? $entry->stock : 0;
        $tempOut += $entry->sale_id ? $entry->stock : 0;
        $entry->stock_out = $entry->sale_id ? $entry->stock : 0;

        $currentStock = $tempIn - $tempOut;
        $entry->current_stock = $currentStock;
    }

    return $ledgerEntries;
});


Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('ledger/{id}', [LedgerController::class, 'ledger'])->name('products.ledger');
Route::get('calculate/stock/{id}', [LedgerController::class, 'calculateStock'])->name('ledger.calculate.stock');
