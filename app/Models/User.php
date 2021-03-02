<?php

namespace App\Models;

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

    public function events() {
        return $this->belongsToMany( Event::class, 'event_user' )
                    ->withTimestamps();
    }


    public function join( Event $event ) {
        if ( $event->isProtected()
             && ! $this->isInvitedForEvent( $event ) ) {
            return false;
        }

        if ( $this->hasAlreadyJoined( $event ) ) {
            return false;
        }

        if ( ! $event->users()->attach( $this ) ) {
            return false;
        }

        return true;
    }

    private function hasAlreadyJoined( Event $event ) {
        return $this->events->contains( $event );
    }

    private function isInvitedForEvent( Event $event ) {
        return $event->invitations()->where( 'email', $this->email )->count() === 1;
    }

}
