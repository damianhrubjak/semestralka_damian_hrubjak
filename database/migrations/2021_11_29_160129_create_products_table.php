<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_category_id', false, true);
            $table->bigInteger('user_id', false, true);
            $table->string('name', 100);
            $table->string('parameters', 191);
            $table->string('condition', 50);
            $table->double('price');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign("product_category_id")->references("id")->on("product_categories")->onDelete("cascade");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
