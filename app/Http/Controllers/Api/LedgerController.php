<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\ProductLedgerInterface;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    protected $ledgerService;

    public function __construct(ProductLedgerInterface $ledgerService)
    {
        $this->ledgerService = $ledgerService;
    }

    public function ledger(Request $request, $id)
    {
        $ledgerEntries = $this->ledgerService->find($id);

        return $ledgerEntries;
    }

    public function calculateStock($id)
    {
        return $this->ledgerService->calculateStockProduct($id);
    }
}
