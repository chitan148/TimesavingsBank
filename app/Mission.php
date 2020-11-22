<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $guarded = ['id'];

    /*public static $rules = [
        'name' => 'required|max: 30',
        'time' => 'required|max: 1000',
        'difficulty' => 'required|max: 5',
    ];*/
    
    const GROUP = [
        1 => '習慣',
        2 => '健康'
    ];
    const IMAGE = [
        1 => 'public/image/habits.png',
        2 => 'public/image/health.png'   
    ];
}
