<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->bigInteger('file_extension_id')->unsigned()->nullable();
            $table->string("name", 191);
            $table->string("file_name", 191);
            $table->string("folder_name", 191);
            $table->timestamps();

            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade");
            $table->foreign("file_extension_id")->references("id")->on("file_extensions")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
