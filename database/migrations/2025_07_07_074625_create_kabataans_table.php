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
        Schema::create('kabataans', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('suffix')->nullable();
            $table->integer('age');
            $table->enum('gender', ['Male', 'Female']);

            $table->enum('work_status',['Employed','Unemployed','Self-Employed','Currently Looking for a job','Not Interested Looking for a job'])->default('Unemployed');
            $table->enum('education_background',['Elementary Level','Elementary Grad','High School Level','Highschool Grad','Vocational Grad','College Level','College Graduate','Masters Level','Masters Grad','Doctorate Level','Doctorate Graduate'])->default('Elementary Level');

            $table->string('purok');

            $table->boolean('earlypregnancy')->default(false);
            $table->string('mstatus')->nullable();
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
        Schema::dropIfExists('kabataans');
    }
};
