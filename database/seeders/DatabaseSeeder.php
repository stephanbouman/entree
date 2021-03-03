<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Invitation;
use App\Models\Organization;
use App\Models\Price;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        Organization::factory( 10 )->create()
                    ->each( function ( Organization $oranization ) {
                        $oranization->events()->saveMany(
                            Event::factory( 3 )->make()
                        );
                    } );
        Event::where( 'free_event', false )->get()->each( function ( Event $event ) {
            $event->prices()->saveMany(
                Price::factory( 2 )->make()
            );

        } );

        User::factory( 20 )->create()->each( function ( User $user ) {
            $this->createTickets( $user, rand( 1, 4 ) );
        } );

        Event::where( 'open_entry', false )->get()->each( function ( Event $event ) {
            $event->invitations()->saveMany(
                Invitation::factory( 12 )->make()
            );
        } );

    }

    private function createTickets( User $user, $amount ) {
        for ( $i = 0; $i < $amount; $i ++ ) {
            Ticket::createTicket($user, Price::all()->random());

        }
    }
}
