<?php

namespace Tests\Unit;

use App\Models\Event;
use App\Models\Invitation;
use App\Models\Organization;
use App\Models\Price;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase {
    use RefreshDatabase;
    use WithFaker;

    /**
     * @return void
     */
    public function test_if_user_can_join_an_open_event() {

        $user = User::factory()->create();

        $organization = Organization::factory()->create();

        $event = $organization->events()->save(
            Event::factory()->make( [ 'open_entry' => true ] )
        );

        $price = $event->prices()->save(
            Price::factory()->make()
        );
        $user->getTicket( $price );

        $this->assertTrue( User::find( $user->id )->events->contains( $event ) );
    }

    /**
     * Test if an user can join an private event of which he is not invited
     *
     * @return void
     */
    public function test_if_user_can_join_an_private_event_without_an_invitation() {

        $user = User::factory()->create();

        $organization = Organization::factory()->create();

        $event = $organization->events()->save(
            Event::factory()->make( [ 'open_entry' => false ] )
        );

        $price = $event->prices()->save(
            Price::factory()->make()
        );

        $user->getTicket( $price );

        $this->assertFalse( User::find( $user->id )->events->contains( $event ) );
    }

    /**
     * Test if an user can join an private event of which he is not invited
     *
     * @return void
     */
    public function test_if_user_can_join_an_private_event_with_an_invitation() {

        $user = User::factory()->create();

        $organization = Organization::factory()->create();

        $event = $organization->events()->save(
            Event::factory()->make( [ 'open_entry' => false ] )
        );

        $event->invitations()->save(
            Invitation::factory()->make( [ 'email' => $user->email ] )
        );

        $price = $event->prices()->save(
            Price::factory()->make()
        );
        
        $user->getTicket($price);

        $this->assertTrue( User::find( $user->id )->events->contains( $event ) );
    }

}
