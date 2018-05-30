<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\SubTask;
use App\Outcome;
use App\User;
use App\Log;

use Auth;
use \Carbon\Carbon;

class OutcomeController extends Controller
{
    public function mit_outcomes_datatable_reload($task_id,$subtask_id)
    {
        $outcomes = Outcome::where("is_active",1)->where("type","mit")->where("task_id",$task_id)->where("subtask_id",$subtask_id)->orderBy("name")->get();

        foreach($outcomes as $o){
            $o->added_by = User::find($o->added_by)->username;
            $o->last_update = User::find($o->last_update)->username;
        }

        $data = array("data" => $outcomes->toArray());
        file_put_contents("json/mit_outcome.json", json_encode($data));
    }

    public function load(Request $request)
    {
    	$this->mit_outcomes_datatable_reload($request->task_id,$request->subtask_id);
    }

    public function create(Request $request)
    {
        $newOutcome = new Outcome;
        $newOutcome->task_id = $request->task_id;
        $newOutcome->subtask_id = $request->subtask_id;
        $newOutcome->name = $request->name;
        $newOutcome->description = $request->description;
        $newOutcome->type = $request->type;
        $newOutcome->is_active = 1;
        $newOutcome->added_by = Auth::user()->id;
        $newOutcome->last_update = Auth::user()->id;

        $newOutcome->save();

        $newLog = new Log;
        $newLog->tracker_type = $request->type;
        $newLog->activity_type = "CREATE";
        $newLog->log_details = "Created a new outcome from the task/subtask <b>".$newOutcome->task->name."/".$newOutcome->subtask->name."] with a name of <b>".$request->name."] and with a description of <b>".$request->description."</b>.";
        $newLog->name = $request->name;
        $newLog->description = $request->description;
        $newLog->added_by = $newOutcome->added_by;
        $newLog->is_active = 1;

        $newLog->save();

        $this->mit_outcomes_datatable_reload($request->task_id,$request->subtask_id);


    }

    public function update(Request $request, Outcome $outcome)
    {

        $newLog = new Log;
        $newLog->tracker_type = $outcome->type;
        $newLog->activity_type = "MODIFY";
        $newLog->log_details = "Updated an outcome from the task/subtask <b>".$outcome->task->name."/".$outcome->subtask->name."</b> that is updated from a name of <b>".$outcome->name."</b> to <b>".$request->name."</b> and from a description of <b>".$outcome->description."</b> to <b>".$request->description."</b>.";
        $newLog->name = $request->name;
        $newLog->description = $request->description;
        $newLog->added_by = Auth::user()->id;
        $newLog->is_active = 1;
        
        $newLog->save();

        $outcome->name = $request->name;
        $outcome->description = $request->description;
        $outcome->last_update = Auth::user()->id;

        $outcome->save();

        $this->mit_outcomes_datatable_reload($outcome->task_id,$outcome->subtask_id);


    }

    public function delete(Request $request, Outcome $outcome)
    {
        $outcome->is_active = 0;
        $outcome->last_update = Auth::user()->id;
        $outcome->deleted_at = Carbon::now();

        $outcome->save();

        $newLog = new Log;
        $newLog->tracker_type = $outcome->type;
        $newLog->activity_type = "REMOVE";
        $newLog->log_details = "Removed an outcome from the task/subtask <b>".$outcome->task->name."/".$outcome->subtask->name."</b> with a name of <b>".$outcome->name."</b> and with a description of <b>".$outcome->description."</b>.";
        $newLog->name = $outcome->name;
        $newLog->description = $outcome->description;
        $newLog->added_by = Auth::user()->id;
        $newLog->is_active = 1;
        
        $newLog->save();


        $this->mit_outcomes_datatable_reload($outcome->task_id,$outcome->subtask_id);

    }

    public function show(Request $request)
    {
        $list = "";

        $outcomes = explode(",", $request->o_list);

        foreach($outcomes as $o){
            if($o){
                $os = Outcome::find($o);
                $list = $list . "<tr><td>".$os->name."</td><td>".$os->description."</td></tr>";
            }
            
        }


        return $list;
    }

    public function paste(Request $request)
    {

        $outcomes = explode(",", $request->o_list);

        foreach($outcomes as $o){
            if($o){
                $os = Outcome::find($o);

                $newOutcome = new Outcome;
                $newOutcome->task_id = $request->t_id;
                $newOutcome->subtask_id = $request->st_id;
                $newOutcome->name = $os->name;
                $newOutcome->description = $os->description;
                $newOutcome->type = "mit";
                $newOutcome->is_active = 1;
                $newOutcome->added_by = Auth::user()->id;
                $newOutcome->last_update = Auth::user()->id;

                $newOutcome->save();

                $newLog = new Log;
                $newLog->tracker_type = "mit";
                $newLog->activity_type = "CREATE";
                $newLog->log_details = "Created a new outcome from the task/subtask <b>".$newOutcome->task->name."/".$newOutcome->subtask->name."] with a name of <b>".$newOutcome->name."] and with a description of <b>".$newOutcome->description."</b>.";
                $newLog->name = $os->name;
                $newLog->description = $os->description;
                $newLog->added_by = Auth::user()->id;
                $newLog->is_active = 1;

                $newLog->save();

            }
            
        }

        $this->mit_outcomes_datatable_reload($request->t_id,$request->st_id);


    }

    
}
