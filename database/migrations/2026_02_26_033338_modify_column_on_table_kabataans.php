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
            $table->enum('youth_group', [
                'Child Youth',
                'Core Youth',
                'Young Adult',
            ])->after('mstatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kabataans', function (Blueprint $table) {
            $table->dropColumn('youth_group');
        });
    }
};
