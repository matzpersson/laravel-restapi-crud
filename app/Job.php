<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'assignedto_id', 'status_id', 'progress'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function assignedto() {
        return $this->belongsTo(User::class)
            ->select(['id', 'name']);
    }
    
    public function status() {
        return $this->belongsTo(LookupStatus::class)
            ->select(['id', 'name','tag','description']);
    }

}