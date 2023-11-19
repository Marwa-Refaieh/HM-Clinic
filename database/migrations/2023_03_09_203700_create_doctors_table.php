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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('phone_number');
            $table->date('birth');
            $table->string('photo');
            $table->text('bio');
            $table->text('gender');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('specialization_id')->constrained('categories')->cascadeOnDelete();
            $table->integer('avarage_price');
            $table->integer('avarage_treatment');//time
            $table->boolean('remotely')->default(0)->nullable();
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
        Schema::dropIfExists('doctors');
    }
};
