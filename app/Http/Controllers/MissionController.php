<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function create(Request $request){
        
        $this->validate($request, Mission::$rules);
        
        $mission = new Mission;
        $mission->name = $request->name;
        $mission->time = $request->time;
        $mission->difficulty = $request->difficulty;
        $mission->image = $request->image;          
        $mission->save();
        
        return redirect()->route('deposit');  
    }
}
