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
        Schema::table('mentals', function (Blueprint $table) {
            DB::statement('ALTER TABLE mentals MODIFY COLUMN eat varchar(255)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mentals', function (Blueprint $table) {
            DB::statement('ALTER TABLE mentals MODIFY COLUMN eat varchar(255)');
        });
    }
};
