<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();

            $table->string('siteName')->nullable();

            $table->string('siteLogo')->nullable();

            $table->string('support')->nullable();

            $table->string('description')->nullable();

            $table->string('address')->nullable();

            $table->string('copyright')->nullable();

            $table->foreignId('language_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('information');
    }
}
