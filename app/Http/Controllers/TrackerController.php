<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\SubTask;
use App\Outcome;
use App\SaleType;
use App\Tracker;

use Auth;
use \Carbon\Carbon;

class TrackerController extends Controller
{
    public function subtaskchange(Request $request){

    	$list = "";

    	$subtasks = SubTask::where("task_id",$request->id)->where("type","qa")->orderBy("name")->get();

    	foreach($subtasks as $st){
            if($st){
                $list = $list . '<option value="'.$st->id.'">'.$st->name.'</option>';
            }
        }

        return $list;
    }

    public function saveqatransaction(Request $request){
    	$newTransaction = new Tracker();

    	$newTransaction->tracker_type = "qa";
    	$newTransaction->task_id = $request->task_id;
    	$newTransaction->subtask_id = $request->subtask_id;
    	$newTransaction->trans_stamp = $request->trans_stamp;
    	$newTransaction->notes = $request->notes;
    	$newTransaction->is_active = 1;
    	$newTransaction->added_by = Auth::user()->id;

    	$newTransaction->save();

    }
}
