<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Organization;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase {
    /**
     * @return void
     */
    public function test_if_a_user_can_see_the_event_index() {
        $organization = Organization::factory()->create();
        $event        = $organization->events()->save( Event::factory()->make() );

        $response = $this->get( route( 'event.index' ) );

        $response->assertSee( $event->title );
        $response->assertSee( route('event.show',$event) );

        $response->assertStatus( 200 );

    }/**
     * @return void
     */
    public function test_if_a_user_can_see_the_event_detail_page() {
        $organization = Organization::factory()->create();
        $event        = $organization->events()->save( Event::factory()->make() );

        $response = $this->get( route( 'event.show',$event ) );

        $response->assertSee( $event->title );
        $response->assertStatus( 200 );

    }
}
