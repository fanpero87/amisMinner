<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="lg:py-12">
        <div v x-data="{ chart: null }" x-init="chart = new Chartisan({
            el: '#dashboard',
            url: '@chart('dashboard_chart')',
            hooks: new ChartisanHooks()
                .datasets('line')
                .tooltip()
                .legend(),
        });"
            class="container w-11/12 mx-auto my-10 overflow-hidden rounded-lg shadow-md lg:container-md">
            <!-- Reload Button -->
            <div class="flex justify-end px-4 py-5 border-b border-gray-200 bg-slate-800 sm:px-6">
                <button x-on:click="chart.update({ background: true })" type="button"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white border border-transparent rounded-md focus:shadow-outline-sky bg-sky-500/50 hover:bg-sky-500 focus:border-sky-700 focus:outline-none active:bg-sky-700">
                    <svg class="w-6 h-6 text-white" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Layout -->
            <div id="dashboard" class="bg-slate-800" style="height: 350px;"></div>
        </div>

        <!-- Charting library -->
        <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
        <!-- Chartisan -->
        <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    </div>

</x-app-layout>
