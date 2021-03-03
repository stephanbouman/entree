<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller {
    public function index() {
        $events = Event::all();

        return view( 'events.index', compact( 'events' ) );
    }

    public function random(  ) {
        return Event::all()->random();
    }

    public function create() {
        //
    }




    public function store( Request $request ) {

    }

    public function show( Event $event ) {
        return view( 'events.show', compact( 'event' ) );
    }

    public function edit( Event $event ) {
        //
    }

    public function update( Request $request, Event $event ) {
        //
    }

    public function destroy( Event $event ) {
        //
    }
}
