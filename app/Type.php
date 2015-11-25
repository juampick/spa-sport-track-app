<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	protected $fillable = ['description'];

    public function tracks()
    {
        return $this->hasMany('App\Track');
    }
}
