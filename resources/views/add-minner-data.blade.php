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
																																id="est_month_payment" name="est_month_payment" type="text">
																								</div>

																								<div class="flex items-center justify-end space-x-2 lg:space-x-4">
																												<x-label for="current_balance">Current Balance</x-label>
																												<input
																																class="p-1 border border-gray-300 rounded-md shadow-sm focus:border-transparent focus:outline-none"
																																id="current_balance" name="current_balance" type="text">
																								</div>
																				</div>

																				<div class="grid grid-cols-1 space-y-2">
																								<div class="flex items-center justify-end space-x-2 lg:space-x-4">
																												<x-label for="m5a_est">M5a (Est BTC/day)</x-label>
																												<input
																																class="p-1 border border-gray-300 rounded-md shadow-sm focus:border-transparent focus:outline-none"
																																id="m5a_est" name="m5a_est" type="text">
																								</div>

																								<div class="flex items-center justify-end space-x-2 lg:space-x-4">
																												<x-label for="x60a_est">X60a (Est BTC/day)</x-label>
																												<input
																																class="p-1 border border-gray-300 rounded-md shadow-sm focus:border-transparent focus:outline-none"
																																id="x60a_est" name="x60a_est" type="text">
																								</div>
																				</div>

																				<div class="grid grid-cols-1 space-y-2">
																								<div class="flex items-center justify-end space-x-2 lg:space-x-4">
																												<x-label for="x20a_est">X20a (Est BTC/day)</x-label>
																												<input
																																class="p-1 border border-gray-300 rounded-md shadow-sm focus:border-transparent focus:outline-none"
																																id="x20a_est" name="x20a_est" type="text">
																								</div>

																								<div class="flex items-center justify-end space-x-2 lg:space-x-4">
																												<x-label for="f40a_est">F40a (Est BTC/day)</x-label>
																												<input
																																class="p-1 border border-gray-300 rounded-md shadow-sm focus:border-transparent focus:outline-none"
																																id="f40a_est" name="f40a_est" type="text">
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
								<div class="lg:py-12">
												<div class="container w-11/12 mx-auto my-10 overflow-hidden rounded-lg shadow-md lg:container-md">
																<!-- Top Border -->
																<div class="flex justify-end px-4 py-5 border-b border-gray-200 bg-slate-800 sm:px-6" />

												</div>

												<!-- Layout -->
												<div class="bg-white" style="height: 350px;">
																{!! $chart->container() !!}
												</div>
								</div>
				</div>

				<!-- Chartjs (> 2.7.1) -->
				<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
				{!! $chart->script() !!}
				</div>
</x-app-layout>
