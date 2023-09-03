<?php

namespace App\Services;

use App\Interfaces\ProductLedgerInterface;
use App\Models\ProductLedger;
use Illuminate\Support\Facades\DB;

use function is_integer;

Class ProductLedgerService implements ProductLedgerInterface
{
    public function find(int $id)
    {
        $ledgerEntries = ProductLedger::query()->with(['purchase:id,invoice', 'sale:id,invoice'])
            ->where('product_ledgers.product_id', $id)
            ->orderBy('date', 'desc')->get();

        $startDate = $ledgerEntries->min('date');

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
    }

    public function calculateStockProduct(int $id)
    {
        $productLedger = ProductLedger::query()
            ->select(
                DB::raw("SUM(case when purchase_id then stock end) as stock_in"),
                DB::raw("SUM(case when sale_id then stock end) as stock_out"),
            )->where('product_id', $id)->get();

        $stock = [
            'stock_in' => $productLedger->sum('stock_in'),
            'stock_out' => $productLedger->sum('stock_out'),
            'current_stock' => ($productLedger->sum('stock_in') - $productLedger->sum('stock_out')),
        ];
        return $stock;
    }
}
