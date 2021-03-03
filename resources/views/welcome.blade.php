<x-app-layout>
    <div class="container mx-auto px-3 sm:px-0 py-20 flex justify-center">
        <div class="max-w-5xl flex space-y-8 flex-col">

            <h1 class="text-7xl font-black text-gray-800 text-center ">Alle evenementen<span class="block text-gray-500"> op één plek!</span>
            </h1>
            <p class="text-center text-gray-400 text-2xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Assumenda autem beatae dolor ipsum magnam possimus quo reprehenderit rerum sint vero.</p>
            <div class="flex space-x-3 justify-center">
                <a href="#"
                   class="font-semibold bg-green-400 border-transparent border rounded-lg px-4 py-2 text-lg  text-green-50"
                   title="maak een account">maak een account</a>
                <button id="startGambling"
                        class="font-semibold border-green-400 border-2 rounded-lg px-4 py-2 text-lg  text-green-500"
                        title="maak een account">geef me een event
                </button>
            </div>
        </div>
    </div>
    <section class="bg-gray-100 py-12">

        <div class="container mx-auto px-3 sm:px-0 bg-gray-100">
            <h2 class="text-3xl font-black text-gray-800 text-center mb-10">Upcoming events</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 gap-6 md:gap-12">

                @foreach($events->sortBy('date')->take(8) as $event)
                    <div class="bg-white shadow-xl rounded-xl flex flex-col justify-between">
                        <div>
                            <img alt="{{$event->title}}" class="h-48 w-full object-cover"
                                 src="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1650&q=80"/>
                            <div class="px-5 pt-5">

                                <h3 class="text-green-600 font-semibold text-xl mb-2">
                                    {{ $event->title }}
                                </h3>
                                <span class="text-gray-500 text-xs block mb-1">{{ $event->date->format('l j F Y') }}</span>
                                <p class="text-gray-600 mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Accusantium cum ducimus eum quae voluptatibus.</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center flex-wrap sm:flex-nowrap px-5 pb-5">
                            <a href="{{ route('events.show',$event) }}"
                               class="order-2 w-full sm:w-auto text-center inline-block border border-green-400 px-3 py-1 text-green-500 rounded hover:bg-green-400 hover:text-white transition-all duration-100">
                                meer informatie
                            </a>
                            <div class="flex w-full sm:w-auto text-xs space-x-1 items-center text-gray-500 order-1 md:order-3 mb-3 sm:mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                     class="w-4 h-4 text-green-400">
                                    <path fill-rule="evenodd"
                                          d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <span class="">{{ $event->location }}</span>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
</x-app-layout>
