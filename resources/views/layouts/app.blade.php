<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welkom bij mijn App</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body class="bg-gray-50">
<header class="bg-green-400">
    <div class="container flex justify-between items-center mx-auto px-3 sm:px-0">
        <svg class="w-16 h-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M94.9848 76C94.9848 55.0132 77.9716 38 56.9848 38C35.998 38 18.9849 55.0132 18.9849 76C18.9849 76 18.9849 76 18.9849 76H28.9847C28.9847 76 28.9847 76 28.9847 75.9999C28.9847 60.536 41.5208 48 56.9847 48C72.4487 48 84.9847 60.536 84.9847 75.9999C84.9847 76 84.9847 76 84.9847 76L94.9848 76Z"
                  fill="white"/>
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M45.2625 75.9999H32.9854C32.9854 62.7451 43.7305 51.9999 56.9853 51.9999C59.552 51.9999 62.0246 52.4029 64.3433 53.1489C54.977 57.4569 47.8649 65.8257 45.2625 75.9999Z"
                  fill="white"/>
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M14.9842 76H5.18457V71.3975C7.51412 44.8345 29.8158 24 56.9837 24C69.5592 24 81.0922 28.4641 90.0843 35.894C90.0855 35.8949 90.0866 35.8958 90.0877 35.8968L82.9771 43.0074C75.8268 37.3664 66.7986 34 56.9842 34C33.7883 34 14.9842 52.804 14.9842 76Z"
                  fill="white"/>
        </svg>
        <nav>
            <ul class="flex space-x-3">
                <li><a href="#" class="text-white font-bold" title="Foo">home</a></li>
                <li><a href="#" class="text-white font-bold" title="Foo">events</a></li>
                <li><a href="#" class="text-white font-bold" title="Foo">login</a></li>
                <li><a href="#" class="text-white font-bold bg-green-500 px-3 py-2 rounded" title="Foo">join</a></li>
            </ul>
        </nav>
    </div>
</header>
    {{ $slot }}
</body>
</html>
