<?php

use App\Models\Product_variant;
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
        Schema::create('import_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->comment('Số lượng nhập vào');
            $table->integer('import_price')->comment('Giá nhập');
            $table->foreignIdFor(model: Product_variant::class)->constrained()->comment('Xác định lịch sử nhập này thuộc biến thể nào');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_histories');
    }
};
