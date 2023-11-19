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
        Schema::create('device_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('record_id')->nullable()->constrained('records')->cascadeOnDelete();
            $table->foreignId('device_id')->constrained('devices')->cascadeOnDelete();
            $table->foreignId('secretary_id')->nullable()->constrained('secretaries')->cascadeOnDelete()->nullable();
            $table->string('fname');
            $table->string('lname');
            $table->string('phone_number');
            $table->boolean('status')->default(0)->nullable();
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
        Schema::dropIfExists('device_orders');
    }
};
