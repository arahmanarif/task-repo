<?php

use Carbon\Carbon;
use App\Models\SaleDetail;
use App\Models\ProductLedger;
use App\Models\PurchaseDetail;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('my-test', function () {

    $purchaseDetails = PurchaseDetail::all();

    foreach ($purchaseDetails as $detail) {

        $addProductLedgerEntry = new ProductLedger();
        $addProductLedgerEntry->purchase_id = $detail->purchase_id;
        $addProductLedgerEntry->product_id = $detail->product_id;
        $addProductLedgerEntry->date = Carbon::now();
        $addProductLedgerEntry->rate = $detail->purchase_rate;
        $addProductLedgerEntry->stock = $detail->quantity;
        $addProductLedgerEntry->save();
    }

    return 'Done';
});
