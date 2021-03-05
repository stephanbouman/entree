<x-app-interface>
    <div class="mx-auto max-w-6xl flex space-x-8">
        <nav class="w-1/4 flex-shrink-0 text-base text-gray-400">

            <ul>
                <li class="mb-2 flex space-x-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="text-gray-500" title="profiel">profiel</a>
                </li>
                <li class="mb-2 flex space-x-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>

                    <a href="#" class="text-gray-500" title="mijn evenementen">mijn evenementen</a>
                </li>
                <li class="mb-2 flex space-x-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="text-gray-500" title="instellingen">instellingen</a>
                </li>
            </ul>

        </nav>
        <div class="w-full">
            <x-page-title>Instellingen</x-page-title>
            <div class="bg-white shadow">
                <dl class="">
                    <div class="grid grid-cols-3 py-4 border-b border-gray-200 px-4">
                        <dt class="text-base text-gray-500">Naam:</dt>
                        <dd class="col-span-2">{{ auth()->user()->name }}</dd>
                    </div>
                    <div class="grid grid-cols-3 py-4 border-b border-gray-200 px-4">
                        <dt class="text-base text-gray-500">Gebruikersnaam:</dt>
                        <dd class="col-span-2">{{ auth()->user()->email }}</dd>
                    </div>
                </dl>
            </div>

        </div>
    </div>
</x-app-interface>
