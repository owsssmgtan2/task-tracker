<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\SubTask;
use App\Image;
use App\User;
use App\Log;


use Auth;
use \Carbon\Carbon;

class ImageController extends Controller
{
    public function gd_images_datatable_reload()
    {
        $images = Image::where("is_active",1)->where("type","gd")->orderBy("name")->get();

        foreach($images as $i){
            $i->added_by = User::find($i->added_by)->username;
            $i->last_update = User::find($i->last_update)->username;
        }

        $data = array("data" => $images->toArray());
        file_put_contents("json/gd_image.json", json_encode($data));
    }

    public function create(Request $request)
    {
    	$newImage = new Image;
        $newImage->name = $request->name;
        $newImage->description = $request->description;
        $newImage->type = "gd";
        $newImage->is_active = 1;
        $newImage->added_by = Auth::user()->id;
        $newImage->last_update = Auth::user()->id;

        $newImage->save();

        $newLog = new Log;
        $newLog->tracker_type = $newImage->type;
        $newLog->activity_type = "CREATE";
        $newLog->log_details = "Created a new image with a name of <b>".$request->name."</b> and with a description of <b>".$request->description."</b>.";
        $newLog->name = $request->name;
        $newLog->description = $request->description;
        $newLog->added_by = $newImage->added_by;
        $newLog->is_active = 1;

        $newLog->save();

        $this->gd_images_datatable_reload();
    }

    public function update(Request $request, Image $image)
    {
        $newLog = new Log;
        $newLog->tracker_type = $image->type;
        $newLog->activity_type = "MODIFY";
        $newLog->log_details = "Updated an image from a name of <b>".$image->name."</b> to <b>".$request->name."</b> and from a description of <b>".$image->description."</b> to <b>".$request->description."</b>.";
        $newLog->name = $request->name;
        $newLog->description = $request->description;
        $newLog->added_by = Auth::user()->id;
        $newLog->is_active = 1;
        
        $newLog->save();

        $image->name = $request->name;
        $image->description = $request->description;
        $image->last_update = Auth::user()->id;

        $image->save();

        $this->gd_images_datatable_reload();

    }

    public function delete(Request $request, Image $image)
{
    $image->is_active = 0;
        $image->last_update = Auth::user()->id;
        $image->deleted_at = Carbon::now();

        $image->save();

        $newLog = new Log;
        $newLog->tracker_type = $image->type;
        $newLog->activity_type = "REMOVE";
        $newLog->log_details = "Removed an image with a name of <b>".$image->name."</b> and with a description of <b>".$image->description."</b>.";
        $newLog->name = $image->name;
        $newLog->description = $image->description;
        $newLog->added_by = Auth::user()->id;
        $newLog->is_active = 1;
        
        $newLog->save();

        $this->gd_images_datatable_reload();

    }
}
