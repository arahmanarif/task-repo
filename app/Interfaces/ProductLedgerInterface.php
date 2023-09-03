<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface ProductLedgerInterface
{
    public function find(int $id);
    public function calculateStockProduct(int $id);
}
