<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_detail = DB::table('user_details')->first();//user_detailsテーブルの最初の一行めのidを取得。
        
        DB::table('missions')->insert([
            [
            'user_detail_id' => $user_detail->id,
            'name' => '歩く',
            'time' => 30,
            'difficulty' => 3,
            'group' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'user_detail_id' => $user_detail->id,
            'name' => '鍵をかける',
            'time' => 10,
            'difficulty' => 1,
            'group' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'user_detail_id' => $user_detail->id,
            'name' => 'マスク',
            'time' => 10,
            'difficulty' => 1,
            'group' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'user_detail_id' => $user_detail->id,
            'name' => 'ニンジンを食べる',
            'time' => 60,
            'difficulty' => 5,
            'group' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'user_detail_id' => $user_detail->id,
            'name' => '電気を消す',
            'time' => 10,
            'difficulty' => 1,
            'group' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
