@foreach($events as $event)
    <a href="{{ route('events.show',$event) }}" title="{{ $event->title }}">{{ $event->title }}</a>
@endforeach
