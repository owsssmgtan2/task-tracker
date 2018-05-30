<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\SubTask;
use App\Outcome;
use App\SaleType;
use App\User;
use App\Log;

use Auth;
use \Carbon\Carbon;


class SaleTypeController extends Controller
{
    public function mit_saletypes_datatable_reload($task_id,$subtask_id,$outcome_id)
    {
        $saletypes = SaleType::where("is_active",1)->where("type","mit")->where("task_id",$task_id)->where("subtask_id",$subtask_id)->where("outcome_id",$outcome_id)->orderBy("name")->get();

        foreach($saletypes as $st){
            $st->added_by = User::find($st->added_by)->username;
            $st->last_update = User::find($st->last_update)->username;
        }

        $data = array("data" => $saletypes->toArray());
        file_put_contents("json/mit_saletype.json", json_encode($data));
    }

    public function load(Request $request)
    {
    	$this->mit_saletypes_datatable_reload($request->task_id,$request->subtask_id,$request->outcome_id);
    }

    public function create(Request $request)
    {
        $newSaleType = new SaleType;
        $newSaleType->task_id = $request->task_id;
        $newSaleType->subtask_id = $request->subtask_id;
        $newSaleType->outcome_id = $request->outcome_id;
        $newSaleType->name = $request->name;
        $newSaleType->description = $request->description;
        $newSaleType->type = $request->type;
        $newSaleType->is_active = 1;
        $newSaleType->added_by = Auth::user()->id;
        $newSaleType->last_update = Auth::user()->id;

        $newSaleType->save();

        $newLog = new Log;
        $newLog->tracker_type = $request->type;
        $newLog->activity_type = "CREATE";
        $newLog->log_details = "Created a new sale type from the task/subtask/outcome <b>".$newSaleType->task->name."/".$newSaleType->subtask->name."/".$newSaleType->outcome->name."</b> with a name of <b>".$request->name."</b> and with a description of <b>".$request->description."</b>.";
        $newLog->name = $request->name;
        $newLog->description = $request->description;
        $newLog->added_by = $newSaleType->added_by;
        $newLog->is_active = 1;

        $newLog->save();

        $this->mit_saletypes_datatable_reload($request->task_id,$request->subtask_id,$request->outcome_id);


    }

    public function update(Request $request, SaleType $saletype)
    {
        $newLog = new Log;
        $newLog->tracker_type = $saletype->type;
        $newLog->activity_type = "MODIFY";
        $newLog->log_details = "Updated a sale type from the task/subtask/outcome <b>".$saletype->task->name."/".$saletype->subtask->name."/".$saletype->outcome->name."] that is updated from a name of <b>".$saletype->name."</b> to <b>".$request->name."</b> and from a description of <b>".$saletype->description."</b> to <b>".$request->description."</b>.";
        $newLog->name = $request->name;
        $newLog->description = $request->description;
        $newLog->added_by = Auth::user()->id;
        $newLog->is_active = 1;
        
        $newLog->save();

        $saletype->name = $request->name;
        $saletype->description = $request->description;
        $saletype->last_update = Auth::user()->id;

        $saletype->save();

        $this->mit_saletypes_datatable_reload($saletype->task_id,$saletype->subtask_id,$saletype->outcome_id);


    }

    public function delete(Request $request, SaleType $saletype)
    {
        $saletype->is_active = 0;
        $saletype->last_update = Auth::user()->id;
        $saletype->deleted_at = Carbon::now();

        $saletype->save();

        $newLog = new Log;
        $newLog->tracker_type = $saletype->type;
        $newLog->activity_type = "REMOVE";
        $newLog->log_details = "Removed a sale type from the task/subtask/outcome <b>".$saletype->task->name."/".$saletype->subtask->name."/".$saletype->outcome->name."</b> with a name of <b>".$saletype->name."</b> and with a description of <b>".$saletype->description."</b>.";
        $newLog->name = $saletype->name;
        $newLog->description = $saletype->description;
        $newLog->added_by = Auth::user()->id;
        $newLog->is_active = 1;
        
        $newLog->save();

        $this->mit_saletypes_datatable_reload($saletype->task_id,$saletype->subtask_id,$saletype->outcome_id);

    }

    public function show(Request $request)
    {
        $list = "";

        $saletypes = explode(",", $request->s_list);

        foreach($saletypes as $s){
            if($s){
                $ss = SaleType::find($s);
                $list = $list . "<tr><td>".$ss->name."</td><td>".$ss->description."</td></tr>";
            }
            
        }


        return $list;
    }

    public function paste(Request $request)
    {

        $saletypes = explode(",", $request->s_list);

        foreach($saletypes as $s){
            if($s){
                $ss = SaleType::find($s);

                $newSaleType = new SaleType;
                $newSaleType->task_id = $request->t_id;
                $newSaleType->subtask_id = $request->st_id;
                $newSaleType->outcome_id = $request->o_id;
                $newSaleType->name = $ss->name;
                $newSaleType->description = $ss->description;
                $newSaleType->type = "mit";
                $newSaleType->is_active = 1;
                $newSaleType->added_by = Auth::user()->id;
                $newSaleType->last_update = Auth::user()->id;

                $newSaleType->save();

                $newLog = new Log;
                $newLog->tracker_type = "mit";
                $newLog->activity_type = "CREATE";
                $newLog->log_details = "Created a new saletype from the task/subtask <b>".$newSaleType->task->name."/".$newSaleType->subtask->name."] with a name of <b>".$newSaleType->name."] and with a description of <b>".$newSaleType->description."</b>.";
                $newLog->name = $ss->name;
                $newLog->description = $ss->description;
                $newLog->added_by = Auth::user()->id;
                $newLog->is_active = 1;

                $newLog->save();

            }
            
        }

        $this->mit_saletypes_datatable_reload($request->t_id,$request->st_id,$request->o_id);


    }
}
