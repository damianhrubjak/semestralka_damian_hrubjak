<?php

use App\Models\ProductCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category', 50);
        });

        $categories = [
            ['category' => 'Smartphone'],
            ['category' => 'Wearable'],
            ['category' => 'Laptop'],
            ['category' => 'PC'],
            ['category' => 'Television'],
            ['category' => 'Other'],
        ];

        ProductCategory::insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_categories');
    }
}
