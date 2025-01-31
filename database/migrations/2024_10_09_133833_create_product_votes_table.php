<?php

use App\Models\Order_detail;
use App\Models\Product_variant;
use App\Models\User;
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
        Schema::create('product_votes', function (Blueprint $table) {
            $table->id();
            $table->string('content')->comment('Nội dung đánh giá');
            $table->float('star')->comment('Số sao');
            $table->boolean('status')->default(false)
            ->comment('Trạng thái đã đánh giá chưa, mặc định là chưa, khi nào người dùng đánh giá thì chuyển thành true, nếu là true thì không cho đánh giá thêm nữa, mỗi sản phẩm trong một đơn hàng chỉ được đánh giá một lần');
            $table->boolean('edit')->default(false)
            ->comment('Trạng thái chỉnh sửa đánh giá, mặc định là chưa, khi nào người dùng sửa đánh giá thì chuyển thành true , nếu là true thì không cho sửa nữa');
            $table->foreignIdFor(Product_variant::class)->constrained()->comment('Xác định người dùng đang đánh giá biến thể nào');
            $table->foreignIdFor(Order_detail::class)->constrained()->comment('Xác định đơn hàng chi tiết nào đang được đánh giá');
            $table->foreignIdFor(User::class)->constrained()->comment('Xác định người dùng nào đang đánh giá');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_votes');
    }
};
