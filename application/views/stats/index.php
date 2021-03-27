<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script src="<?=base_url('assets/js/chart.min.js')?>"></script>
<div class="container">
	<div class="row">
		<div class="col-4">
			<br>
			<h4 class="text-center">Daily</h4>
			<canvas id="chart0"></canvas>
			<br>
		</div>
		<div class="col-4">
			<br>
			<h4 class="text-center">Weekly</h4>
			<canvas id="chart1"></canvas>
			<br>
		</div>
		<div class="col-4">
			<br>
			<h4 class="text-center">Monthly</h4>
			<canvas id="chart2"></canvas>
			<br>
		</div>
		<div class="col-4">
			<br>
			<h4 class="text-center">All the time</h4>
			<canvas id="chart3"></canvas>
			<br>
		</div>
		<div class="col-4">
			<br>
			<h4 class="text-center">Par branche</h4>
			<canvas id="chartMatter"></canvas>
			<br>
		</div>
	</div>
	<div class="text-center">
		<a href="<?=base_url()?>" class="btn btn-lg btn-outline-warning">Compteur</a>
	</div>
</div>
<script>
	<?php foreach ($charts as $no => $chart) { ?>
		let config<?=$no?> = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						<?=$chart->duration?>,
						<?=$chart->total?>,
					],
					backgroundColor: [
						'rgb(255, 99, 132)',
						'rgb(54, 162, 235)',
					]
				}],
				labels: [
					'Flushing',
					'In class',
				]
			}
		};

		let ctx<?=$no?> = document.getElementById('chart<?=$no?>').getContext('2d');
		var chart<?=$no?> = new Chart(ctx<?=$no?>, config<?=$no?>);
	<?php } ?>

	function randomColor() {
		let r = Math.floor(Math.random() * 255);
		let g = Math.floor(Math.random() * 255);
		let b = Math.floor(Math.random() * 255);
		return "rgb(" + r + "," + g + "," + b + ")";
	}

	let configMatter = {
		type: 'pie',
		data: {
			datasets: [{
				data: [
					<?=implode(", ", array_map(function($matter) { return $matter->duration; }, $matters))?>
				],
				backgroundColor: [
					<?=str_repeat('randomColor(), ', count($matters))?>
				]
			}],
			labels: [
				<?=implode(", ", array_map(function($matter) { return '"'.($matter->matter ?? 'autre').'"'; }, $matters))?>
			]
		}
	};

	let ctxMatter = document.getElementById('chartMatter').getContext('2d');
	var chartMatter = new Chart(ctxMatter, configMatter);
</script>