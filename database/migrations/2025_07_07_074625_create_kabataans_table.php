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

            $table->string('motherfullname');
            $table->string('fatherfullname');

            $table->string('purok');
            $table->string('religion')->nullable();

            $table->boolean('earlypregnancy')->default(false); // true if pregnant or has child
            $table->string('mstatus')->nullable(); // marital status

            $table->boolean('ismalnourished')->default(false);
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
