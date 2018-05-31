<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use \Carbon\Carbon;
use Auth;
use Hash;


class UserController extends Controller
{

	public function users_datatable_reload()
    {
        $users = User::where("is_active",1)->orderBy("access_level")->get();

        $data = array("data" => $users->toArray());
        file_put_contents("json/users.json", json_encode($data));
    }

    public function filter_users_datatable_reload($val)
    {
        if($val == 0){
            $users = User::where("is_active",1)->orderBy("access_level")->get();
        }else{
            $users = User::where("is_active",1)->where("access_level","like","%".$val."%")->orderBy("access_level")->get();
        }
        

        $data = array("data" => $users->toArray());
        file_put_contents("json/users.json", json_encode($data));
    }

    public function index()
    {
    	$this->users_datatable_reload();

        return view('users.index')
        ->with('title','System User');
    }

    public function create(Request $request)
    {
        $newUser = new User;
        $newUser->name = $request->name;
        $newUser->username = $request->username;
        $newUser->password = Hash::make($request->password);
        $newUser->email = $request->email;
        $newUser->access_level = $request->team_id;
        $newUser->site = $request->site;
        $newUser->added_by = Auth::user()->id;

        $newUser->save();

        $this->users_datatable_reload();
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->username = $request->username;

        if (!empty($request->password)) 
        {
            $user->password = Hash::make($request->password);
        }

        $user->email = $request->email;
        $user->access_level = $request->team_id;
        $user->site = $request->site;

        $user->save();

        $this->users_datatable_reload();
    }

    public function delete(Request $request, User $user)
    {
        $user->is_active = 0;
        $user->deleted_at = Carbon::now();

        $user->save();

        $this->users_datatable_reload();
    }

    public function filter(Request $request)
    {
        $this->filter_users_datatable_reload($request->access_level);
    }
}
