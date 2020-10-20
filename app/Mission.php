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
    const GROUPS = [
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
    public function getGroupsTitleAttribute(){
        //GROUPS配列から状態値をキーに文字列表現を探して返している。
        $groups = $this->attributes['groups'];
        //自クラスのメソッドにアクセス　keyがtitleのvalueをもらう
        return self::GROUPS[$groups]['title'];
    }
    
    public function getGroupsImageAttribute(){
        //状態値
        $groups = $this->attributes['groups'];
        //keyがimageのvalueをもらう
        return self::GROUPS[$groups]['image'];
    }
}
