<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends BaseModel
{
    protected $guarded = [];

    public function productLedger()
    {
        return $this->hasMany(ProductLedger::class);
    }
}
