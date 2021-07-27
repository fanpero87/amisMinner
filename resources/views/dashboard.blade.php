<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Chart -->
    <div x-data="{chart: null}" x-init="chart = new Chartisan({
        el: '#dashboard',
        url: '@chart('dashboard_chart')',
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
        <div id="dashboard" style="height: 350px;"></div>
    </div>
</div>

<!-- Charting library -->
<script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>


                </div>
            </div>
        </div>
    </div>

</x-app-layout>
