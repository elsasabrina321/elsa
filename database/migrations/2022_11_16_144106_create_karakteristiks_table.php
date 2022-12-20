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
        Schema::create('karakteristiks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kepribadian_id');
            $table->foreign('kepribadian_id')->references('id')->on('kepribadians');
            $table->string('kode');
            $table->string('karakteristik');
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
        Schema::dropIfExists('karakteristiks');
    }
};
