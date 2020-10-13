<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMission;//フォームリクエスト

class MissionController extends Controller
{
    public function showCreateMissionForm(){
        return view('missions/create');
    }

    public function create(CreateMission $request){
        
        //$this->validate($request, Mission::$rules);
        
        $mission = new Mission;
        $mission->name = $request->name;
        $mission->time = $request->time;
        $mission->difficulty = $request->difficulty;
        $mission->image = $request->image;          
        $mission->save();
        
        return redirect()->route('deposit');  
    }
}
