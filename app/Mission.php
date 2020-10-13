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
    
    const IMAGE = [1 => '画像のURL', 2 => '画像のURL'];

}
