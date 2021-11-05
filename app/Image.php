<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table  = "medias";

    public function get_route(){
        return "storage/".$this->route;
    }
}
