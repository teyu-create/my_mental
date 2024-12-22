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
        Schema::create('mentals', function (Blueprint $table) {
            $table->id();
            $table->string('mental_weather'); // 気分（天気マーク）を保存するカラム
            $table->string('sleep_time');  // 睡眠時間を保存するカラム
            $table->string('eat');  // ごはんを保存するカラム
            $table->string('go'); // お仕事・学校を保存するカラム
            $table->string('diary'); //どんな1日だったかを保存するカラム
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
        Schema::dropIfExists('mentals');
    }
};
