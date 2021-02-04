<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
    protected $table = "difficulties";

    public function trackers (){
        return $this->hasMany(Tracker::class, "difficulty_id", "id");
    }
}
