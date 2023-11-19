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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained('doctors')->cascadeOnDelete();
            $table->foreignId('appointment_id')->constrained('appointments')->cascadeOnDelete();
            $table->float('blood_pressure_rate' , 8, 2);
            $table->float('heart_rate' , 8, 2);
            $table->float('respiratory_rate' , 8, 2);
            $table->float('saturation_rate' , 8, 2);
            $table->text('story');
            $table->boolean('blood_pressure')->default(0)->nullable();
            $table->boolean('asthma')->default(0)->nullable();
            $table->boolean('diabetes')->default(0)->nullable();
            $table->boolean('heart_disease')->default(0)->nullable();
            $table->boolean('renal_disease')->default(0)->nullable();
            $table->boolean('tumors')->default(0)->nullable();
            $table->text('medicinal_history')->nullable();
            $table->text('surgical_history')->nullable();
            $table->boolean('headache')->default(0)->nullable();
            $table->boolean('chest_pain')->default(0)->nullable();
            $table->boolean('cough')->default(0)->nullable();
            $table->boolean('dizziness')->default(0)->nullable();
            $table->boolean('dyspnea')->default(0)->nullable();
            $table->boolean('abdominal_pain')->default(0)->nullable();
            $table->boolean('constipation')->default(0)->nullable();
            $table->boolean('vomiting')->default(0)->nullable();
            $table->boolean('arthralgia')->default(0)->nullable();
            $table->boolean('diarhea')->default(0)->nullable();
            $table->text('diagnosis');
            $table->text('medicinal_analysis')->nullable();
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
        Schema::dropIfExists('records');
    }
};
