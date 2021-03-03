<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model {
    use HasFactory;

    protected $dates = [
        'date'
    ];


    public function Prices() {
        return $this->hasMany( Price::class );
    }

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

    public function getAvailablePricesAttribute() {
        return $this->prices->map(function(Price $price){
            $sold = 0;
            return [
                'title' => $price->title,
                'price' => $price->price,
                'sold' => $sold,
                'maximum' => $price->maximum,
                'available' => !$price->stop_selling->isPast() && ( $price->maximum - $sold > 0)
            ];
        });
    }

    public function getIsFreeOfChargeAttribute() {
        return $this->free_event;
    }
}
