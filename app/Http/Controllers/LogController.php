<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Log;
use App\User;

use Auth;
use \Carbon\Carbon;

class LogController extends Controller
{
    public function logs_datatable_reload()
    {
        $logs = Log::where("is_active",1)->orderBy("created_at","desc")->get();

        foreach($logs as $l){
            $l->added_by = User::find($l->added_by)->name;
        }

        $data = array("data" => $logs->toArray());
        file_put_contents("json/log.json", json_encode($data));
    }

    public function index()
    {

    	$this->logs_datatable_reload();

        return view('logs.index')
        ->with('title','Transaction Logs');
    }
}
