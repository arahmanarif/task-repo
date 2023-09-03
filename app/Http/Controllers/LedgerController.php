<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Interfaces\ProductLedgerInterface;

class LedgerController extends Controller
{
    protected $ledgerService;

    public function __construct(ProductLedgerInterface $ledgerService)
    {
        $this->ledgerService = $ledgerService;
    }

    public function ledger(Request $request, $id)
    {
        if ($request->ajax()) {

            $ledgerEntries = $this->ledgerService->find($id);

            return DataTables::collection($ledgerEntries)
                ->addColumn('description', function ($row) {
                    return $row->purchase_id ? '<strong>' . __('Purchase') . '</strong>-' . $row?->purchase?->invoice : '<strong>' . __('Sale') . '</strong>-' . $row?->sale?->invoice;
                })
                ->addColumn('stock_in', function ($row) {
                    return $row->stock_in;
                })
                ->addColumn('stock_out', function ($row) {
                    return $row->stock_out;
                })
                ->addColumn('current_stock', function ($row) {
                    return $row->current_stock;
                })
                ->rawColumns(['description', 'stock_in', 'stock_out', 'current_stock', 'action'])
                ->make(true);
        }

        $product = Product::where('id', $id)->first();

        return view('product-ledger.ledger', compact('product'));
    }

    public function calculateStock($id)
    {
        return $this->ledgerService->calculateStockProduct($id);
    }
}
