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
        Schema::create('wsfgs', function (Blueprint $table) {
            $table->id();
            $table->string('document_series_no');
            $table->string('batch_no');
            $table->string('pallet_no');
            $table->string('location');
            $table->string('prepared_by');
            $table->string('approved_by');
            $table->string('released_by');
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
        Schema::dropIfExists('wsfgs');
    }
};
