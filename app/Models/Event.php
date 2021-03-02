<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model {
    use HasFactory;

    protected $dates = [
        'date'
    ];


    public function organization() {
        return $this->belongsTo( Organization::class );
    }

    public function participants() {
        return $this->belongsToMany( User::class, 'event_user' )
                    ->withTimestamps();
    }

    public function invitations() {
        return $this->hasMany( Invitation::class );
    }

    public function isProtected() {
        return ! $this->open_entry;
    }
}
