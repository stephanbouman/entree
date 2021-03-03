<?php

namespace App\Models;

use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tickets() {
        return $this->hasMany( Ticket::class );
    }

    public function getEventsAttribute() {
        return $this->tickets->map( function ( Ticket $ticket ) {
            return $ticket->price->event;
        } );
    }

    public function getTicket( Price $price ) {
        $event = $price->event;
        if ( $event->isProtected()
             && ! $this->isInvitedForEvent( $event ) ) {
            return false;
        }

        if ( $this->hasAlreadyJoined( $event ) ) {
            return false;
        }


        return Ticket::createTicket( $this, $price );
    }

    private function hasAlreadyJoined( Event $event ) {
        return $this->events->contains( $event );
    }

    private function isInvitedForEvent( Event $event ) {
        return $event->invitations()->where( 'email', $this->email )->count() === 1;
    }

}
