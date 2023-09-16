<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('gallery_categories');
            $table->foreignId('language_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->string('title');
            $table->string('caption');
            $table->string('image');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
}
