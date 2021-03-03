<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo( User::class );
    }

    public function price() {
        return $this->belongsTo( Price::class );
    }

    public function event() {
        return $this->price->event;
    }

    static public function createTicket( User $user, Price $price ) {
        return self::create( [
            'price_id' => $price->id,
            'user_id'  => $user->id
        ] );

    }

}
