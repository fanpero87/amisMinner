<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Alpine -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


</head>


<body class="bg-gray-100">

    <div class="w-full p-5 bg-blue-700">
        <div class="flex items-center justify-evenly">
            <h3 class="text-xl font-bold leading-6 text-white">
                Amis Minners
            </h3>

            <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" onclick="event.preventDefault();
                        this.closest('form').submit();"
                        class="flex items-center px-2 py-2 text-base font-medium leading-6 text-black transition duration-150 ease-in-out bg-white rounded-md group focus:outline-none">
                        {{ __('Log out') }}
                    </a>
                </form>
            </div>
        </div>
    </div>

    <!-- Input Data -->
    <div class="container p-5 mx-10 mt-10 space-y-4 bg-white rounded-lg shadow-md lg:container-md lg:mx-auto">
        <form action="{{ route('minner.store') }}" method="POST">
            @csrf
            <div class="flex flex-row items-center space-x-4">
                <label for="est_month_payment">Est Month Payment</label>
                <input
                    class="p-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent"
                    type="text" name="est_month_payment" id="est_month_payment">

                <label for="current_balance">Current Balance</label>
                <input
                    class="p-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent"
                    type="text" name="current_balance" id="current_balance">
            </div>
            <div class="flex flex-row items-center mt-4 space-x-4">
                <label for="m5a_est">Estimate Minner m5a</label>
                <input
                    class="p-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent"
                    type="text" name="m5a_est" id="m5a_est">
                <label for="x60a_est">Estimate Minner x60a</label>
                <input
                    class="p-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent"
                    type="text" name="x60a_est" id="x60a_est">
                <label for="x20a_est">Estimate Minner x20a</label>
                <input
                    class="p-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent"
                    type="text" name="x20a_est" id="x20a_est">
            </div>
            <hr class="mt-8">
            <div class="flex justify-end pt-6">
                <button
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-600 border border-indigo-600 rounded-md focus:outline-none focus:shadow-outline-blue hover:bg-indigo-500 active:bg-indigo-700"
                    type="submit">Add Data</button>
            </div>
        </form>
    </div>
    <!-- Chart -->
    <div x-data="{chart: null}" x-init="chart = new Chartisan({
            el: '#minner',
            url: '@chart('minners_chart')',
            hooks: new ChartisanHooks()
                .datasets('line')
                .tooltip()
                .legend(),
            });"
        class="container mx-10 my-10 overflow-hidden bg-white shadow sm:rounded-lg lg:container-md lg:mx-auto">
        <div class="flex justify-end px-4 py-5 bg-white border-b border-gray-200 sm:px-6">
            <button x-on:click="chart.update({ background: true })" type="button"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700">
                <svg class="w-6 h-6 text-white" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                    </path>
                </svg>
            </button>
        </div>

        <div class="pt-8">
            <div id="minner" style="height: 350px;"></div>
        </div>
    </div>


    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>


</body>

</html>
