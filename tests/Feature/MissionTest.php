<?php

namespace Tests\Feature;

use App\Http\Requests\CreateMission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Mission;

class MissionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    //とりあえずこのテスト怖いからコメントアウト

    // テストする毎にデータベースをリフレッシュしてマイグレーションを再実行する
    use RefreshDatabase;
    /**
     * 各テストメソッドの実行前に呼ばれる
     */
    public function setUp():void
    {
        parent::setUp();
        
        //テストケース実行前にミッションデータを作成する
        $this->seed('UsersTableSeeder');
        $this->seed('MissionsTableSeeder');
    }
    /**
    * グループが定義された値ではない場合はバリデーションエラー
    * @test
    */
    public function group_should_be_within_defined_numbers()
    {
        $response = $this->post('users/1/missions/create', [
            'name' => '毎日寝る',
            'time' => '10',
            'difficulty' => '1',
            'group' => '7'
        ]);
        $response->assertSessionHasErrors([
        'group' => ' グループ には 習慣、健康 のどれかを選んで下さい',
        ]);
    }
    
}
