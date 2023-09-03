<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LedgerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "product_id" => $this->product_id,
            "purchase_id" => $this->purchase_id,
            "sale_id" => $this->sale_id,
            "date" => $this->date,
            "rate" => $this->rate,
            "stock" => $this->stock,
            "stock_in" => $this->stock_in,
            "stock_out" => $this->stock_out,
            "current_stock" => $this->current_stock,
            "purchase" =>
            [
                "id" => $this->id,
                "invoice" => $this->invoice,
            ],
            "sale" =>
            [
                "id" => $this->id,
                "invoice" => $this->invoice,
            ],
        ];
    }
}
