<x-app-interface>
    <x-slot name="sidebar">
        <aside class="mb-4">
            <div class="flex space-x-4 items-center border-b border-gray-200 pb-4 mb-4">
                <img class="w-10 h-10 object-cover rounded-full"
                     src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=634&q=80"
                     alt="{{ $event->organization->title }}"/>
                <dl>
                    <dt class="text-xs">organisator:</dt>
                    <dd class="text-gray-800 text-lg">{{ $event->organization->title }}</dd>
                </dl>
            </div>
            <div class="border-b border-gray-200 mb-4 pb-4">
                <div class="flex w-full sm:w-auto text-lg space-x-2 items-center text-gray-500 order-1 md:order-3 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                         class="w-6 h-6 text-green-400">
                        <path fill-rule="evenodd"
                              d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                              clip-rule="evenodd"/>
                    </svg>
                    <span class="">{{ $event->location }}</span>
                </div>

                <div class="flex w-full sm:w-auto text-lg space-x-2 items-center text-gray-500 order-1 md:order-3 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                         class="w-6 h-6 text-green-400">>
                        <path fill-rule="evenodd"
                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                              clip-rule="evenodd"/>
                    </svg>
                    <span class="">{{ $event->date->format('l j F Y') }}</span>
                </div>
                <div class="flex w-full sm:w-auto text-lg space-x-2 items-center text-gray-500 order-1 md:order-3 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                         class="w-6 h-6 text-green-400">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                              clip-rule="evenodd"/>
                    </svg>
                    <span class="">{{ $event->date->format('h:i') }} uur</span>
                </div>

            </div>
            @if(!$event->is_free_of_charge)
                <div class="border-b border-gray-200 mb-4 pb-4">
                    <h2 class="font-bold text-gray-700 mb-2">Tickets</h2>
                    @foreach($event->availablePrices as $price)
                        <dl class="flex justify-between mb-2">
                            <dt class="text-gray-500">{{$price['title']}}</dt>
                            <dd class="border-dashed border-green-200 border-b">&euro; {{ number_format($price['price'],2,'.','.')}}</dd>
                        </dl>
                    @endforeach
                </div>
            @endif
        </aside>
        <button
            class="bg-green-400 text-white text-lg text-center w-full py-2 rounded-lg hover:bg-green-500 duration-100 transitions-all hover:shadow-lg">

            @if($event->is_free_of_charge)
                aanmelden
            @else
                bestellen
            @endif
        </button>
    </x-slot>


    <img class="h-80 mb-8 rounded-lg w-full object-cover"
         src="https://images.unsplash.com/photo-1517457373958-b7bdd4587205?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80"/>


    <x-page-title>{{ $event->title }}</x-page-title>
    <p class="text-xl text-gray-400 mb-4 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        Accusantium atque blanditiis dicta, doloribus est explicabo hic in ipsum mollitia neque nisi non obcaecati
        officia perferendis quasi quibusdam quis ratione sed sequi similique temporibus ut voluptates! At consequatur,
        earum facere fuga maxime molestias nam nulla optio!</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At deserunt modi quas quos voluptas? Aspernatur atque
        culpa doloribus eum ipsa labore laborum maxime minima nam placeat. A dolorum est exercitationem impedit
        repudiandae. Beatae consequuntur debitis ea mollitia, neque quibusdam. Asperiores culpa hic incidunt odio quos.
        Aut, consectetur corporis deleniti, doloremque eos facilis hic laboriosam molestiae nobis nostrum odit
        perferendis quam quis quod reprehenderit similique soluta tempora tempore ullam vel voluptas.</p>
</x-app-interface>
