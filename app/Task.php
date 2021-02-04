<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function subtasks (){
        return $this->hasMany(SubTask::class, "task_id", "id");
    }

    public function outcomes (){
        return $this->hasMany(Outcome::class, "task_id", "id");
    }

    public function saletypes (){
        return $this->hasMany(SaleType::class, "task_id", "id");
    }

    public function trackers (){
        return $this->hasMany(Tracker::class, "task_id", "id");
    }
}
