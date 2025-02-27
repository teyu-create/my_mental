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
        'sleep_time' => 'required',
        'up_time' => 'required',
        'diary' => 'required',
    );
       
     // カラムのデータを配列（array）へ型の変換($casts)
    protected $casts = [
        'eat' => 'array',
    ];
    
    public function user(){

        return $this->belongsTo('App\Models\User');
    
      }
      

}
