<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {


        Schema::create( 'events', function ( Blueprint $table ) {
            $table->id();
            $table->integer( 'organization_id' );
            $table->string( 'title' );
            $table->dateTime( 'date' );
            $table->string( 'location' );
            $table->boolean( 'open_entry' )->default( true );
            $table->boolean( 'public' )->default( true );
            $table->boolean( 'free_event' )->default( true );
            $table->string( 'slug' );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'events' );
    }
}
