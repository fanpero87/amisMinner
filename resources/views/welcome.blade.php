<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amis Minners</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


</head>


<body>
    <div class="relative h-screen m-2 overflow-hidden bg-indigo-500 rounded-lg">
        <!-- Left Side -->
        <div class="absolute z-30 flex w-6/12 h-full">
            <div class="relative z-30 w-5/6 px-6 py-8 text-white md:py-10 md:w-1/2">
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                    <span class="block xl:inline">Los Minners de hoy</span>
                    <span class="block text-white xl:inline">Son la casa del Manana</span>
                </h1>

                <div class="mt-3 sm:mt-0 sm:ml-3">
                    <a href="/" class="flex items-center justify-center w-full px-8 py-3 text-base font-medium text-indigo-700 bg-indigo-100 border border-transparent rounded-md hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                    Login
                    </a>
                </div>
            </div>
            <!-- Polygon -->
            <div class="absolute top-0 right-0 flex w-full h-full">
                <div class="w-1/6 h-full bg-indigo-500"></div>
                <div class="relative w-1/6">
                  <svg
                    fill="currentColor"
                    viewBox="0 0 100 100"
                    class="absolute inset-y-0 z-20 h-full text-indigo-500"
                  >
                    <polygon id="diagonal" points="0,0 100,0 50,100 0,100"></polygon>
                  </svg>
                  <svg
                    fill="currentColor"
                    viewBox="0 0 100 100"
                    class="absolute inset-y-0 z-10 h-full ml-6 text-white opacity-50"
                  >
                    <polygon points="0,0 100,0 50,100 0,100"></polygon>
                  </svg>
                </div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="absolute top-0 right-0 block w-9/12 h-full">
            <img class="object-cover h-full min-w-full" src="{{ asset('/storage/images/bitcoin.jpg') }}" alt="Bitcoin Image" />
        </div>
    </div>
</body>

</html>
