<?php

namespace Tests\Feature;

use App\Http\Requests\CreateMission;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Log;

class UserDetailTest extends TestCase
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
    use RefreshDatabase;
    /**
     * 各テストメソッドの実行前に呼ばれる
     */
    public function gender_should_be_within_defined_numbers(){
       
        $response = $this->post(route('register',[
            'gender' => 9,
        ]));
        // $response->dumpSession();
        $response->assertSessionHasErrors([
            'gender' => '「性別」は男性、女性の中から選んで下さい'
        ]);
    }
}
