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
        Schema::table('kabataans', function (Blueprint $table) {
            $table->boolean('isvoters')->default(false);
            $table->date('birthdate')->null();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_kabataans', function (Blueprint $table) {
            $table->dropColumn(['isvoters','birthdate']);
        });
    }
};
