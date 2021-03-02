<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model {
    use HasFactory;

    public function public_events() {
        return $this->events()->wherePublic( true );
    }

    public function events() {
        return $this->hasMany( Event::class );
    }
}
