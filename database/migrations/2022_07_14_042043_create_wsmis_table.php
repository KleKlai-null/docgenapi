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
        Schema::create('wsmis', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->string('document_series_no');
            $table->string('pallet_no');
            $table->string('warehouse');
            $table->string('wh_location'); 
            $table->string('profit_center')->nullable();
            $table->string('sub_profit_center')->nullable();
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
        Schema::dropIfExists('wsmis');
    }
};
