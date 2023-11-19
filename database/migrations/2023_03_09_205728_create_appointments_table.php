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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('doctor_id')->constrained('doctors')->cascadeOnDelete();
            $table->string('fname');
            $table->string('lname');
            $table->string('phone_number');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('address');
            $table->date('birth');
            $table->time('time');
            $table->date('date');
            $table->integer('pricing')->default(0)->nullable(); // حالة الموعد منفذ او غير منفذ 
            $table->boolean('remotely')->default(0)->nullable(); // اذا كان الموعد عن بعد
            $table->string('email')->nullable();
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
        Schema::dropIfExists('appointments');
    }
};
