<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function trackers (){
        return $this->hasMany(Tracker::class, "image_id", "id");
    }
}
