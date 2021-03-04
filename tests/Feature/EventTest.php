<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Organization;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase {
    use RefreshDatabase;
    use WithFaker;

    /**
     * @return void
     */
    public function test_if_a_user_can_see_the_event_index() {
        $organization = Organization::factory()->create();
        $event        = $organization->events()->save( Event::factory()->make() );

        $response = $this->get( route( 'events.index' ) );

        $response->assertSee( $event->title );
        $response->assertSee( route( 'events.show', $event ) );

        $response->assertStatus( 200 );

    }

    /**
     * @return void
     */
    public function test_if_a_user_can_see_the_event_detail_page() {
        $organization = Organization::factory()->create();
        $event        = $organization->events()->save( Event::factory()->make() );

        $response = $this->get( route( 'events.show', $event ) );

        $response->assertSee( $event->title );
        $response->assertStatus( 200 );

    }
}
