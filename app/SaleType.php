<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleType extends Model
{
    protected $table = "saletypes";

    public function task (){
        return $this->belongsTo(Task::class)->select("id", "name", "description");
    }
	
    public function subtask (){
        return $this->belongsTo(SubTask::class)->select("id", "name", "description");
    }

    public function outcome (){
        return $this->belongsTo(Outcome::class)->select("id", "name", "description");
    }

    public function trackers (){
        return $this->hasMany(Tracker::class, "saletype_id", "id");
    }
}
