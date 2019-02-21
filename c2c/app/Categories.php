<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    public function sub()
    {
        return $this->hasMany('App\Categories','parent_id','id');
    }
}
