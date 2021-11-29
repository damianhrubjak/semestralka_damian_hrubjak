<?php

use App\Models\FileExtension;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileExtensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_extensions', function (Blueprint $table) {
            $table->id();
            $table->string('extension', 20);
        });

        $file_exts = array(
            ["extension" => "jpeg"],
            ["extension" => "jpg"],
            ["extension" => "png"],
            ["extension" => "apng"],
            ["extension" => "gif"],
            ["extension" => "bmp"],
            ["extension" => "svg"],
            ["extension" => "webp"]
        );
        FileExtension::insert($file_exts);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_extensions');
    }
}
