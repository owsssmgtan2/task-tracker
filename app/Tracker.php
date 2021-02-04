<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    public function task (){
        return $this->belongsTo(Task::class)->select("id", "name", "description");
    }

    public function subtask (){
        return $this->belongsTo(SubTask::class)->select("id", "name", "description");
    }

    public function outcome (){
        return $this->belongsTo(Outcome::class)->select("id", "name", "description");
    }

    public function saletype (){
        return $this->belongsTo(SaleType::class)->select("id", "name", "description");
    }

    public function image (){
        return $this->belongsTo(Image::class)->select("id", "name", "description");
    }

    public function difficulty (){
        return $this->belongsTo(Difficulty::class)->select("id", "name", "description");
    }
}
