<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-white">
            {{ __('Add Data') }}
        </h2>
    </x-slot>

    <div class="lg:py-12">
        <!-- Input Data -->
        <div
            class="container w-11/12 p-5 mx-auto my-5 space-y-2 rounded-lg shadow-md lg:container-md bg-slate-800 lg:space-y-0">
            <form action="{{ route('minner.store') }}" method="POST">
                @csrf
                <div class="grid items-center grid-cols-1 gap-4 space-y-2 lg:grid-cols-3">

                    <div class="grid grid-cols-1 space-y-2">
                        <div class="flex items-center justify-end space-x-2 lg:space-x-4">
                            <x-label for="est_month_payment">Est Monthly Payment</x-label>
                            <input
                                class="p-1 border border-gray-300 rounded-md shadow-sm focus:border-transparent focus:outline-none"
                                type="text" name="est_month_payment" id="est_month_payment">
                        </div>

                        <div class="flex items-center justify-end space-x-2 lg:space-x-4">
                            <x-label for="current_balance">Current Balance</x-label>
                            <input
                                class="p-1 border border-gray-300 rounded-md shadow-sm focus:border-transparent focus:outline-none"
                                type="text" name="current_balance" id="current_balance">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 space-y-2">
                        <div class="flex items-center justify-end space-x-2 lg:space-x-4">
                            <x-label for="m5a_est">M5a (Est BTC/day)</x-label>
                            <input
                                class="p-1 border border-gray-300 rounded-md shadow-sm focus:border-transparent focus:outline-none"
                                type="text" name="m5a_est" id="m5a_est">
                        </div>

                        <div class="flex items-center justify-end space-x-2 lg:space-x-4">
                            <x-label for="x60a_est">X60a (Est BTC/day)</x-label>
                            <input
                                class="p-1 border border-gray-300 rounded-md shadow-sm focus:border-transparent focus:outline-none"
                                type="text" name="x60a_est" id="x60a_est">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 space-y-2">
                        <div class="flex items-center justify-end space-x-2 lg:space-x-4">
                            <x-label for="x20a_est">X20a (Est BTC/day)</x-label>
                            <input
                                class="p-1 border border-gray-300 rounded-md shadow-sm focus:border-transparent focus:outline-none"
                                type="text" name="x20a_est" id="x20a_est">
                        </div>

                        <div class="flex items-center justify-end space-x-2 lg:space-x-4">
                            <x-label for="f40a_est">F40a (Est BTC/day)</x-label>
                            <input
                                class="p-1 border border-gray-300 rounded-md shadow-sm focus:border-transparent focus:outline-none"
                                type="text" name="f40a_est" id="f40a_est">
                        </div>
                    </div>

                </div>

                <div class="flex justify-end pt-6">
                    <button
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out border rounded-md focus:shadow-outline-blue border-sky-600 bg-sky-500/50 hover:bg-sky-500 focus:outline-none active:bg-sky-700"
                        type="submit">Add Data</button>
                </div>
            </form>
        </div>

        <!-- Chart -->
        <div x-data="{ chart: null }" x-init="chart = new Chartisan({
            el: '#minner',
            url: '@chart('minners_chart')',
            hooks: new ChartisanHooks()
                .datasets('line')
                .tooltip()
                .legend(),
        });"
            class="container w-11/12 mx-auto my-10 overflow-hidden rounded-lg shadow-md lg:container-md">
            <!-- Reload Button -->
            <div class="flex justify-end px-4 py-5 border-b border-gray-200 bg-slate-800 sm:px-6">
                <button x-on:click="chart.update({ background: true })" type="button"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white border border-transparent rounded-md focus:shadow-outline-indigo bg-sky-500/50 hover:bg-sky-500 focus:border-sky-700 focus:outline-none active:bg-sky-700">
                    <svg class="w-6 h-6 text-white" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Layout -->
            <div id="minner" class="bg-white" style="height: 350px;"></div>
        </div>

        <!-- Charting library -->
        <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
        <!-- Chartisan -->
        <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    </div>
</x-app-layout>
