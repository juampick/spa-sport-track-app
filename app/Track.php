<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

}
