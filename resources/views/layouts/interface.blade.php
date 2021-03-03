<x-app-layout>
    <div class="container mx-auto pt-12 flex px-3 md:space-x-10 flex-wrap md:flex-nowrap">
        <div class="w-full order-2 text-lg text-gray-700">
            {{ $slot }}
        </div>
        @if(isset($sidebar))
            <div class="md:max-w-xs max-w-max order-1 md:order-3 w-full">
                <div class="border-dashed border-2 w-full p-4 border-gray-200 rounded-lg text-gray-500 md:max-w-xs max-w-max mb-4 md:mb-0 order-1 md:order-3">
                    {{ $sidebar }}
                </div>
            </div>
        @endif

    </div>

</x-app-layout>
