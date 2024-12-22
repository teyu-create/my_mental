<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mental extends Model
{
    use HasFactory;
    // 以下を追記
    protected $guarded = array('id');

    public static $rules = array(
        'mental_weather' => 'required',
        'sleep_time' => 'required',
        'eat' => 'required',
        'go' => 'required',
        'diary' => 'required',
    );
}
