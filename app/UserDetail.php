<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public $timestamps = false;

    const GENDERS = [1 => '男性', 2 => '女性'];
}
