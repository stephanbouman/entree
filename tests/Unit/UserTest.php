<?php

namespace Tests\Unit;

use App\Models\Event;
use App\Models\Invitation;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase {
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testIfUserCanJoinAnOpenEvent() {

        $user = User::factory()->create();

        $organization = Organization::factory()->create();

        $event = $organization->events()->save(
            Event::factory()->make( [ 'open_entry' => true ] )
        );

        $user->joinEvent( $event );

        $this->assertTrue( User::find( $user->id )->events->contains( $event ) );
    }

    /**
     * Test if an user can join an private event of which he is not invited
     *
     * @return void
     */
    public function testIfUserCanJoinAnPrivateEventWithoutAnInvitation() {

        $user = User::factory()->create();

        $organization = Organization::factory()->create();

        $event = $organization->events()->save(
            Event::factory()->make( [ 'open_entry' => false ] )
        );

        $user->joinEvent( $event );

        $this->assertFalse( User::find( $user->id )->events->contains( $event ) );
    }

    /**
     * Test if an user can join an private event of which he is not invited
     *
     * @return void
     */
    public function testIfUserCanJoinAnPrivateEventWithAnInvitation() {

        $user = User::factory()->create();

        $organization = Organization::factory()->create();

        $event = $organization->events()->save(
            Event::factory()->make( [ 'open_entry' => false ] )
        );

        $event->invitations()->save(
            Invitation::factory()->make( [ 'email' => $user->email ] )
        );

        $user->joinEvent( $event );

        $this->assertTrue( User::find( $user->id )->events->contains( $event ) );
    }

}
