<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LookupStatus extends Model
{
	//protected $guarded = [];
	
    public function jobs() {
        return $this->hasMany(Job::class, 'status_id');
    }
}