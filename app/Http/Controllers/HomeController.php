<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\SubTask;

use Auth;
use \Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $name = Auth::user()->name . " - " . $this->role_name(Auth::user()->access_level) . " (" . Auth::user()->site . ")";

        $qtasks = Task::where("type","qa")->where("is_active",1)->orderBy("name")->get();

        return view('home',compact('qtasks'))
        ->with('title','Dashboard')
        ->with('name',$name);
    }

    public function role_name($val)
    {
        if($val == 1){
            return "IT Admin";
        }elseif($val == 2){
            return "MIT Admin";
        }elseif($val == 3){
            return "MIT Staff";
        }elseif($val == 4){
            return "QA Admin";
        }elseif($val == 5){
            return "QA Staff";
        }elseif($val == 6){
            return "GD Admin";
        }elseif($val == 7){
            return "GD Staff";
        }elseif($val == 8){
            return "Reports";
        }
        
    }
}
