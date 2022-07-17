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
        Schema::create('mro_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wsmro_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('item_code');
            $table->string('item_description');
            $table->bigInteger('qty');
            $table->string('uom');
            $table->longText('remarks')->nullable();
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
        Schema::dropIfExists('mro_items');
    }
};
