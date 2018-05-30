<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\SubTask;
use App\Image;
use App\Difficulty;
use App\User;
use App\Log;


use Auth;
use \Carbon\Carbon;

class DifficultyController extends Controller
{
    public function gd_difficulties_datatable_reload()
    {
        $difficulties = Difficulty::where("is_active",1)->where("type","gd")->orderBy("name")->get();

        foreach($difficulties as $d){
            $d->added_by = User::find($d->added_by)->username;
            $d->last_update = User::find($d->last_update)->username;
        }

        $data = array("data" => $difficulties->toArray());
        file_put_contents("json/gd_difficulty.json", json_encode($data));
    }

    public function create(Request $request)
    {
    	$newDifficulty = new Difficulty;
        $newDifficulty->name = $request->name;
        $newDifficulty->description = $request->description;
        $newDifficulty->type = "gd";
        $newDifficulty->is_active = 1;
        $newDifficulty->added_by = Auth::user()->id;
        $newDifficulty->last_update = Auth::user()->id;

        $newDifficulty->save();

        $newLog = new Log;
        $newLog->tracker_type = $newDifficulty->type;
        $newLog->activity_type = "CREATE";
        $newLog->log_details = "Created a new difficulty with a name of <b>".$request->name."</b> and with a description of <b>".$request->description."</b>.";
        $newLog->name = $request->name;
        $newLog->description = $request->description;
        $newLog->added_by = $newDifficulty->added_by;
        $newLog->is_active = 1;

        $newLog->save();

        $this->gd_difficulties_datatable_reload();
    }

    public function update(Request $request, Difficulty $difficulty)
    {
        $newLog = new Log;
        $newLog->tracker_type = $difficulty->type;
        $newLog->activity_type = "MODIFY";
        $newLog->log_details = "Updated a difficulty from a name of <b>".$difficulty->name."</b> to <b>".$request->name."</b> and from a description of <b>".$difficulty->description."</b> to <b>".$request->description."</b>.";
        $newLog->name = $request->name;
        $newLog->description = $request->description;
        $newLog->added_by = Auth::user()->id;
        $newLog->is_active = 1;
        
        $newLog->save();

        $difficulty->name = $request->name;
        $difficulty->description = $request->description;
        $difficulty->last_update = Auth::user()->id;

        $difficulty->save();

        $this->gd_difficulties_datatable_reload();

    }

    public function delete(Request $request, Difficulty $difficulty)
    {
        $difficulty->is_active = 0;
        $difficulty->last_update = Auth::user()->id;
        $difficulty->deleted_at = Carbon::now();

        $difficulty->save();

        $newLog = new Log;
        $newLog->tracker_type = $difficulty->type;
        $newLog->activity_type = "REMOVE";
        $newLog->log_details = "Removed a difficulty with a name of <b>".$difficulty->name."</b> and with a description of <b>".$difficulty->description."</b>.";
        $newLog->name = $difficulty->name;
        $newLog->description = $difficulty->description;
        $newLog->added_by = Auth::user()->id;
        $newLog->is_active = 1;
        
        $newLog->save();

        $this->gd_difficulties_datatable_reload();

    }
}
