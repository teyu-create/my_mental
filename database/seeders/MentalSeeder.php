<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            [
                'id' => 61,
                'mental_weather' => '晴れ',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>'["朝","昼"]',
                'go_or_home' =>'行った',
                'diary' =>'テスト１',
                'user_id' => 16,
                'created_at' =>"2025-01-01"
            ],
            [
                'id' => 62,
                'mental_weather' => 'くもり',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>'["昼","夜"]',
                'go_or_home' =>'行った',
                'diary' =>'テスト２',
                'user_id' => 16,
                'created_at' =>"2025-01-02"
            ],
            [
                'id' => 63,
                'mental_weather' => '雨',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>'["夜"]',
                'go_or_home' =>'休んだ',
                'diary' =>'テスト３',
                'user_id' => 16,
                'created_at' =>"2025-01-03"
            ],
            [
                'id' => 64,
                'mental_weather' => '晴れ',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>'["朝","昼","夜"]',
                'go_or_home' =>'休日',
                'diary' =>'テスト４',
                'user_id' => 16,
                'created_at' =>"2025-01-04"
            ],
            [
                'id' => 65,
                'mental_weather' => 'くもり',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>NULL,
                'go_or_home' =>'休日',
                'diary' =>'テスト５',
                'user_id' => 16,
                'created_at' =>"2025-01-05"
            ],
            [
                'id' => 66,
                'mental_weather' => '雨',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>'["昼","夜"]',
                'go_or_home' =>'行った',
                'diary' =>'テスト６',
                'user_id' => 16,
                'created_at' =>"2025-01-06"
            ],
            [
                'id' => 67,
                'mental_weather' => '晴れ',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>'["朝","昼","夜"]',
                'go_or_home' =>'行った',
                'diary' =>'テスト７',
                'user_id' => 16,
                'created_at' =>"2025-01-07"
            ],
            [
                'id' => 68,
                'mental_weather' => 'くもり',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>'["昼","夜"]',
                'go_or_home' =>'行った',
                'diary' =>'テスト８',
                'user_id' => 16,
                'created_at' =>"2025-01-08"
            ],
            [
                'id' => 69,
                'mental_weather' => '晴れ',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>NULL,
                'go_or_home' =>'休んだ',
                'diary' =>'テスト９',
                'user_id' => 16,
                'created_at' =>"2025-01-09"
            ],
            [
                'id' => 70,
                'mental_weather' => '雨',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>'["朝","夜"]',
                'go_or_home' =>'行った',
                'diary' =>'テスト10',
                'user_id' => 16,
                'created_at' =>"2025-01-10"
            ],
            [
                'id' => 71,
                'mental_weather' => '雨',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>NULL,
                'go_or_home' =>'休日',
                'diary' =>'テスト11',
                'user_id' => 16,
                'created_at' =>"2025-01-11"
            ],
            [
                'id' => 72,
                'mental_weather' => '晴れ',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>'["朝","昼"]',
                'go_or_home' =>'行った',
                'diary' =>'テスト12',
                'user_id' => 16,
                'created_at' =>"2025-01-12"
            ],
            [
                'id' => 73,
                'mental_weather' => 'くもり',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>'["昼","夜"]',
                'go_or_home' =>'行った',
                'diary' =>'テスト13',
                'user_id' => 16,
                'created_at' =>"2025-01-13"
            ],
            [
                'id' => 74,
                'mental_weather' => '雨',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>'["夜"]',
                'go_or_home' =>'休んだ',
                'diary' =>'テスト14',
                'user_id' => 16,
                'created_at' =>"2025-01-14"
            ],
            [
                'id' => 75,
                'mental_weather' => '晴れ',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>'["朝","昼","夜"]',
                'go_or_home' =>'休日',
                'diary' =>'テスト15',
                'user_id' => 16,
                'created_at' =>"2025-01-15"
            ],
            [
                'id' => 76,
                'mental_weather' => 'くもり',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>NULL,
                'go_or_home' =>'休日',
                'diary' =>'テスト16',
                'user_id' => 16,
                'created_at' =>"2025-01-16"
            ],
            [
                'id' => 77,
                'mental_weather' => '雨',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>'["昼","夜"]',
                'go_or_home' =>'行った',
                'diary' =>'テスト17',
                'user_id' => 16,
                'created_at' =>"2025-01-17"
            ],
            [
                'id' => 78,
                'mental_weather' => '晴れ',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>'["朝","昼","夜"]',
                'go_or_home' =>'行った',
                'diary' =>'テスト18',
                'user_id' => 16,
                'created_at' =>"2025-01-18"
            ],
            [
                'id' => 79,
                'mental_weather' => 'くもり',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>'["昼","夜"]',
                'go_or_home' =>'行った',
                'diary' =>'テスト19',
                'user_id' => 16,
                'created_at' =>"2025-01-19"
            ],
            [
                'id' => 80,
                'mental_weather' => '晴れ',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>NULL,
                'go_or_home' =>'休んだ',
                'diary' =>'テスト20',
                'user_id' => 16,
                'created_at' =>"2025-01-20"
            ],
            [
                'id' => 81,
                'mental_weather' => '雨',
                'sleep_time' => '00:00',
                'up_time' => '07:30',
                'eat' =>'["朝","夜"]',
                'go_or_home' =>'行った',
                'diary' =>'テスト21',
                'user_id' => 16,
                'created_at' =>"2025-01-21"
            ]
        ];
        DB::table('mentals')->insert($param);

    }
}
