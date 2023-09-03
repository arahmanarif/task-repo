<?php

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_ledgers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constant()->onDelete('cascade');
            $table->foreignIdFor(Purchase::class)->nullable()->constant()->onDelete('cascade');
            $table->foreignIdFor(Sale::class)->nullable()->constant()->onDelete('cascade');
            $table->timestamp('date');
            $table->decimal('rate', 22, 2)->default(0);
            $table->decimal('stock', 22, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_ledgers');
    }
};
