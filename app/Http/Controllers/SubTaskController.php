<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\SubTask;
use App\User;
use App\Log;

use Auth;
use \Carbon\Carbon;

class SubTaskController extends Controller
{
    public function mit_subtasks_datatable_reload($val)
    {
        $subtasks = SubTask::where("is_active",1)->where("type","mit")->where("task_id",$val)->orderBy("name")->get();

        foreach($subtasks as $st){
            $st->added_by = User::find($st->added_by)->username;
            $st->last_update = User::find($st->last_update)->username;
        }

        $data = array("data" => $subtasks->toArray());
        file_put_contents("json/mit_subtask.json", json_encode($data));
    }

    public function qa_subtasks_datatable_reload($val)
    {
        $subtasks = SubTask::where("is_active",1)->where("type","qa")->where("task_id",$val)->orderBy("name")->get();

        foreach($subtasks as $st){
            $st->added_by = User::find($st->added_by)->username;
            $st->last_update = User::find($st->last_update)->username;
        }

        $data = array("data" => $subtasks->toArray());
        file_put_contents("json/qa_subtask.json", json_encode($data));
    }

    public function create(Request $request)
    {
        $newSubTask = new SubTask;
        $newSubTask->task_id = $request->id;
        $newSubTask->name = $request->name;
        $newSubTask->description = $request->description;
        $newSubTask->type = $request->type;
        $newSubTask->is_active = 1;
        $newSubTask->added_by = Auth::user()->id;
        $newSubTask->last_update = Auth::user()->id;

        $newSubTask->save();

        $newLog = new Log;
        $newLog->tracker_type = $request->type;
        $newLog->activity_type = "CREATE";
        $newLog->log_details = "Created a new subtask from the task <b>".$newSubTask->task->name."</b> with a name of <b>".$request->name."</b> and with a description of <b>".$request->description."</b>.";
        $newLog->name = $request->name;
        $newLog->description = $request->description;
        $newLog->added_by = $newSubTask->added_by;
        $newLog->is_active = 1;

        $newLog->save();

        $this->mit_subtasks_datatable_reload($request->id);
        $this->qa_subtasks_datatable_reload($request->id);


    }

    public function load(Request $request)
    {
    	if($request->type == "mit"){
    		$this->mit_subtasks_datatable_reload($request->id);
    	}else{
    		$this->qa_subtasks_datatable_reload($request->id);
    	}
    }

    public function update(Request $request, SubTask $subtask)
    {

        $newLog = new Log;
        $newLog->tracker_type = $subtask->type;
        $newLog->activity_type = "MODIFY";
        $newLog->log_details = "Updated a subtask from the task <b>".$subtask->task->name."</b> that is updated from a name of <b>".$subtask->name."</b> to <b>".$request->name."</b> and from a description of <b>".$subtask->description."</b> to <b>".$request->description."</b>.";
        $newLog->name = $request->name;
        $newLog->description = $request->description;
        $newLog->added_by = Auth::user()->id;
        $newLog->is_active = 1;
        
        $newLog->save();

        $subtask->name = $request->name;
        $subtask->description = $request->description;
        $subtask->last_update = Auth::user()->id;

        $subtask->save();

        $this->mit_subtasks_datatable_reload($subtask->task_id);
        $this->qa_subtasks_datatable_reload($subtask->task_id);


    }

    public function delete(Request $request, SubTask $subtask)
    {
        $subtask->is_active = 0;
        $subtask->last_update = Auth::user()->id;
        $subtask->deleted_at = Carbon::now();

        $subtask->save();

        $newLog = new Log;
        $newLog->tracker_type = $subtask->type;
        $newLog->activity_type = "REMOVE";
        $newLog->log_details = "Removed a subtask from the task <b>".$subtask->task->name."</b> with a name of <b>".$subtask->name."</b> and with a description of <b>".$subtask->description."</b>.";
        $newLog->name = $subtask->name;
        $newLog->description = $subtask->description;
        $newLog->added_by = Auth::user()->id;
        $newLog->is_active = 1;
        
        $newLog->save();

        $this->mit_subtasks_datatable_reload($subtask->task_id);
        $this->qa_subtasks_datatable_reload($subtask->task_id);

    }
}
