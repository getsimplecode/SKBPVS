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
        Schema::create('sk_officials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kabataan_id')->references('id')->on('kabataans');
            $table->enum('position',['chairman','treasurer','secretary','kagawad'])->default('kagawad');
            $table->enum('selection_type',['elected','appointed'])->default('elected');
            $table->date('term_start');
            $table->enum('status',['active','resigned','terminated','inactive','completed_term'])->default('active');
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('sk_officials');
    }
};
