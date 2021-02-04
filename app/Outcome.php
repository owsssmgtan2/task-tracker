<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
	public function task (){
        return $this->belongsTo(Task::class)->select("id", "name", "description");
    }
	
    public function subtask (){
        return $this->belongsTo(SubTask::class)->select("id", "name", "description");
    }

    public function saletypes (){
        return $this->hasMany(SaleType::class, "outcome_id", "id");
    }

    public function trackers (){
        return $this->hasMany(Tracker::class, "outcome_id", "id");
    }
}
