<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
{
    protected $table = "subtasks";

    public function task (){
        return $this->belongsTo(Task::class)->select("id", "name", "description");
    }

    public function outcomes (){
        return $this->hasMany(Outcome::class, "subtask_id", "id");
    }

    public function saletypes (){
        return $this->hasMany(SaleType::class, "subtask_id", "id");
    }

    public function trackers (){
        return $this->hasMany(Tracker::class, "subtask_id", "id");
    }
}
