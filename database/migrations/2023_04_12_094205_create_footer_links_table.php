<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_links', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('footer_link_catrgories');

            $table->string('title');
            $table->string('link');

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
        Schema::dropIfExists('footer_links');
    }
}
