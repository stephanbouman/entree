<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function __invoke( Request $request ) {
        $events = Event::wherePublic(true)->where('open_entry',true)->get();

        return view( 'welcome', compact( 'events' ) );
    }
}
