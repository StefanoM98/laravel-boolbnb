<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_sponsor', function (Blueprint $table) {
            $table->unsignedBigInteger('apartment_id');
            $table->foreignId('apartment_id')->references('id')->on('apartments')->onDelete('cascade');

            $table->unsignedBigInteger('sponsor_id');
            $table->foreignId('sponsor_id')->references('id')->on('sponsors')->onDelete('cascade');

            $table->primary(['apartment_id', 'sponsor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_sponsor');
    }
};
