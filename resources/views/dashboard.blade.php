<x-app-layout>
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

</x-app-layout>
