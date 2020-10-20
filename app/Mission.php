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
        1 => ['title' => '習慣', 'image' => 'public/image/habits.png'],
        2 => ['title' => '健康', 'image' => 'public/image/health.png']
    ];

    /*const GROUP = [
        1 => '習慣',
        2 => '健康'
    ];

    const IMAGE = [
        1 => 'public/image/habits.png',
        2 => 'public/image/health.png'   
    ];
    */
    public function getGroupTitleAttribute(){
        //GROUP配列から状態値をキーに文字列表現を探して返している。
        $group = $this->attributes['group'];
        //自クラスのメソッドにアクセス　keyがtitleのvalueをもらう
        return self::GROUP[$group]['title'];
    }
    
    public function getGroupImageAttribute(){
        //状態値
        $group = $this->attributes['group'];
        //keyがimageのvalueをもらう
        return self::GROUP[$group]['image'];
    }
}
