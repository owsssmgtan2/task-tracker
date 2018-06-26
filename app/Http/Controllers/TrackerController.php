<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\SubTask;
use App\Outcome;
use App\SaleType;
use App\Tracker;
use App\User;

use Auth;
use \Carbon\Carbon;

class TrackerController extends Controller
{
    public function qa_tracker_datatable_reload($user_id,$date){
        $qa_tracks = Tracker::with('task','subtask')->where("is_active",1)->where("tracker_type","qa")->where("added_by",$user_id)->whereDate("created_at",$date)->orderBy("created_at","desc")->get();

        foreach($qa_tracks as $qt){
            $qt->added_by = User::find($qt->added_by)->username;
        }

        $data = array("data" => $qa_tracks->toArray());
        file_put_contents("json/qa_tracker.json", json_encode($data));
    }

    public function gd_tracker_datatable_reload($user_id,$date){
        $gd_tracks = Tracker::with('task','image','difficulty')->where("is_active",1)->where("tracker_type","gd")->where("added_by",$user_id)->whereDate("created_at",$date)->orderBy("created_at","desc")->get();

        foreach($gd_tracks as $gt){
            $gt->added_by = User::find($gt->added_by)->username;
        }

        $data = array("data" => $gd_tracks->toArray());
        file_put_contents("json/gd_tracker.json", json_encode($data));
    }

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

        $this->qa_tracker_datatable_reload($newTransaction->added_by,Carbon::today()->toDateString());

    }

    public function savegdtransaction(Request $request){
        $newTransaction = new Tracker();

        $newTransaction->tracker_type = "gd";
        $newTransaction->task_id = $request->task_id;
        $newTransaction->image_id = $request->image_id;
        $newTransaction->difficulty_id = $request->difficulty_id;
        $newTransaction->sku = $request->sku_id;
        $newTransaction->ticket_id = $request->ticket_id;
        $newTransaction->notes = $request->notes;
        $newTransaction->is_active = 1;
        $newTransaction->added_by = Auth::user()->id;

        $newTransaction->save();

        $this->gd_tracker_datatable_reload($newTransaction->added_by,Carbon::today()->toDateString());

    }

    public function changedate(Request $request){
        if($request->type == 'qa'){
            $this->qa_tracker_datatable_reload(Auth::user()->id,Carbon::parse($request->newdate)->toDateString());
        }else if($request->type == 'gd'){
            $this->gd_tracker_datatable_reload(Auth::user()->id,Carbon::parse($request->newdate)->toDateString());
        }
        
    }

    public function editqatransaction(Request $request, Tracker $track){

        $track->task_id = $request->task_id;
        $track->subtask_id = $request->subtask_id;
        $track->trans_stamp = $request->trans_stamp;
        $track->notes = $request->notes;

        $track->save();

        $this->qa_tracker_datatable_reload($track->added_by,Carbon::today()->toDateString());

    }

    public function editgdtransaction(Request $request, Tracker $track){

        $track->task_id = $request->task_id;
        $track->image_id = $request->image_id;
        $track->difficulty_id = $request->difficulty_id;
        $track->ticket_id = $request->ticket_id;
        $track->sku = $request->sku_id;
        $track->notes = $request->notes;

        $track->save();

        $this->gd_tracker_datatable_reload($track->added_by,Carbon::today()->toDateString());

    }
}
