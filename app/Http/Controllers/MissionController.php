<?php

namespace App\Http\Controllers;

use App\UserDetail;
use App\Mission;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMission;//フォームリクエスト

class MissionController extends Controller
{
    public function showCreateMissionForm(UserDetail $user_detail){
        return view('missions/create', ['user_detail_id' => $user_detail->id]);
    }

    public function create(UserDetail $user_detail, CreateMission $request){
        
        //$this->validate($request, Mission::$rules);
        
        $mission = new Mission;
        $mission->name = $request->name;
        $mission->time = $request->time;
        $mission->difficulty = $request->difficulty;
        $mission->image = $request->image;          
        $user_detail->missions()->save($mission);
        
        return redirect()->route('deposit');  
    }
}
