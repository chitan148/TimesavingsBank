<?php

use Illuminate\Database\Seeder;

class UserDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();//usersテーブルの最初の一行めを取得。

        DB::table('user_details')->insert([
            [
            'user_id' => $user->id,//それのid
            'name' => 'テストなの',
            'gender' => 2,
            'saving_time' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
