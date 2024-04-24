<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

   

        <div class="relative flex-col flex selection:bg-[#FF2D20] selection:text-white flex-wrap">



            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
        </div>





        <div class="flex flex-col items-center justify-center min-h-screen">
            <x-application-logo class="justify-center w-24 h-24 fill-current text-primary" />
            <x-button primary xl href="{{ route('register') }}">Get Started Here</x-button>
        </div>





</body>

</html>
