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
        Schema::create('service_calls', function (Blueprint $table) {
            $table->id();
            $table->string('document_series_no');
            $table->string('customer_name');
            $table->string('contact_number');
            $table->string('phone_no');
            $table->string('status');
            $table->string('item_no');
            $table->string('description');
            $table->string('mfr_serial_no');
            $table->string('serial_no');
            $table->string('subject');
            $table->string('origin');
            $table->string('problem_type');
            $table->string('assigned_to');
            $table->string('priority');
            $table->string('call_type');
            $table->string('technician');
            $table->string('remarks');
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
        Schema::dropIfExists('service_calls');
    }
};
