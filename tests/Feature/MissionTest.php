<?php

namespace Tests\Feature;

use App\Http\Requests\CreateMission;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Mission;
use App\User;
use Log;

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
    //とりあえずこのテスト怖いからコメントアウト//git push heroku masterのテスト

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
        $this->seed('UserDetailsTableSeeder');
    
    }
    /**
    * グループが定義された値ではない場合はバリデーションエラー
    * @test
    */
    public function group_should_be_within_defined_numbers()
    {
        //idはオートインクリメントがややこしいので、メルアドでユーザー取得
        $user = User::where('email','dummy@email.com')->first();
        $user_detail = $user->user_detail->first();
        // Log::info($user->user_detail->first());
        // Log::info($user_detail->id);
        
        $response = $this->actingAs($user)->post(route('missions.create', ['user_detail' => $user_detail->id]), [
            // 'name' => '毎日寝る',
            // 'time' => '10',
            // 'difficulty' => '1',
            'group' => '7', //エラーにしたいのだけあればよかった
            // 'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now(),
        ]);
        // $response->dumpSession();
        $response->assertSessionHasErrors([
        'group' => '「グループ」には習慣、健康、運動、趣味、学習、手続きのどれかを選んで下さい'//このときはinは要らない
        ]);
    }
    
}
