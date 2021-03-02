@foreach($events as $event)
    <a href="{{ route('event.show',$event) }}" title="{{ $event->title }}">{{ $event->title }}</a>
@endforeach
