<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maps', function (Blueprint $table) {
            $table->uuid('id_map')->primary(); // Menggunakan UUID sebagai primary key
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('geojson');
            $table->double('latitude', 10, 7);
            $table->double('longitude', 10, 7);
            $table->timestamps();
            $table->softDeletes(); // Menambahkan soft delete column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maps');
    }
}
