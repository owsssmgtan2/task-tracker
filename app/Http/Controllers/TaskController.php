<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\SubTask;
use App\User;
use App\Log;

use Auth;
use \Carbon\Carbon;

class TaskController extends Controller
{
	public function mit_tasks_datatable_reload()
    {
        $tasks = Task::where("is_active",1)->where("type","mit")->orderBy("name")->get();

        foreach($tasks as $t){
            $t->added_by = User::find($t->added_by)->username;
            $t->last_update = User::find($t->last_update)->username;
        }

        $data = array("data" => $tasks->toArray());
        file_put_contents("json/mit_task.json", json_encode($data));
    }

    public function qa_tasks_datatable_reload()
    {
        $tasks = Task::where("is_active",1)->where("type","qa")->orderBy("name")->get();

        foreach($tasks as $t){
            $t->added_by = User::find($t->added_by)->username;
            $t->last_update = User::find($t->last_update)->username;
        }

        $data = array("data" => $tasks->toArray());
        file_put_contents("json/qa_task.json", json_encode($data));
    }

    public function gd_tasks_datatable_reload()
    {
        $tasks = Task::where("is_active",1)->where("type","gd")->orderBy("name")->get();

        foreach($tasks as $t){
            $t->added_by = User::find($t->added_by)->username;
            $t->last_update = User::find($t->last_update)->username;
        }

        $data = array("data" => $tasks->toArray());
        file_put_contents("json/gd_task.json", json_encode($data));
    }


    public function index()
    {

    	$this->mit_tasks_datatable_reload();
    	$this->qa_tasks_datatable_reload();
    	$this->gd_tasks_datatable_reload();

        app('App\Http\Controllers\SubTaskController')->mit_subtasks_datatable_reload(0);
        app('App\Http\Controllers\SubTaskController')->qa_subtasks_datatable_reload(0);
        app('App\Http\Controllers\OutcomeController')->mit_outcomes_datatable_reload(0,0);
        app('App\Http\Controllers\SaleTypeController')->mit_saletypes_datatable_reload(0,0,0);
        app('App\Http\Controllers\ImageController')->gd_images_datatable_reload();
        app('App\Http\Controllers\DifficultyController')->gd_difficulties_datatable_reload();

        return view('tasks.index')
        ->with('title','Transactions');
    }

    public function create(Request $request)
    {
        $newTask = new Task;
        $newTask->name = $request->name;
        $newTask->description = $request->description;
        $newTask->type = $request->type;
        $newTask->is_active = 1;
        $newTask->added_by = Auth::user()->id;
        $newTask->last_update = Auth::user()->id;

        $newTask->save();

        $newLog = new Log;
        $newLog->tracker_type = $request->type;
        $newLog->activity_type = "CREATE";
        $newLog->log_details = "Created a new task with a name of <b>".$request->name." </b> and with a description of <b>".$request->description."</b>.";
        $newLog->name = $request->name;
        $newLog->description = $request->description;
        $newLog->added_by = $newTask->added_by;
        $newLog->is_active = 1;

        $newLog->save();

        $this->mit_tasks_datatable_reload();
        $this->qa_tasks_datatable_reload();
        $this->gd_tasks_datatable_reload();


    }

    public function update(Request $request, Task $task)
    {
        $newLog = new Log;
        $newLog->tracker_type = $task->type;
        $newLog->activity_type = "MODIFY";
        $newLog->log_details = "Updated a task from a name of <b>".$task->name."</b> to <b>".$request->name."</b> and from a description of <b>".$task->description."</b> to <b>".$request->description."</b>.";
        $newLog->name = $request->name;
        $newLog->description = $request->description;
        $newLog->added_by = Auth::user()->id;
        $newLog->is_active = 1;
        
        $newLog->save();

        $task->name = $request->name;
        $task->description = $request->description;
        $task->last_update = Auth::user()->id;

        $task->save();

        $this->mit_tasks_datatable_reload();
        $this->qa_tasks_datatable_reload();
        $this->gd_tasks_datatable_reload();

    }

    public function delete(Request $request, Task $task)
    {
        $task->is_active = 0;
        $task->last_update = Auth::user()->id;
        $task->deleted_at = Carbon::now();

        $task->save();

        $newLog = new Log;
        $newLog->tracker_type = $task->type;
        $newLog->activity_type = "REMOVE";
        $newLog->log_details = "Removed a task with a name of <b>".$task->name."</b> and with a description of <b>".$task->description."</b>.";
        $newLog->name = $task->name;
        $newLog->description = $task->description;
        $newLog->added_by = Auth::user()->id;
        $newLog->is_active = 1;
        
        $newLog->save();

        $this->mit_tasks_datatable_reload();
        $this->qa_tasks_datatable_reload();
        $this->gd_tasks_datatable_reload();

    }
}
