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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('analisa_id');
            $table->foreign('analisa_id')->references('id')->on('analisas');
            $table->unsignedBigInteger('kepribadian_id')->nullable();
            $table->foreign('kepribadian_id')->references('id')->on('kepribadians');
            $table->string('kepercayaan');
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
        Schema::dropIfExists('details');
    }
};
