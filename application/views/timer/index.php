<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="stopwatch">
	<h1><span class="gold">TIME</span> to <span class="gold">FLUSH</span></h1>
	<div class="circle">
		<span class="time" id="display">00:00:00</span>
	</div>

	<div class="controls">
		<button class="buttonPlay">
			<img id="playButton" src="<?=base_url('assets/img/play-button.svg')?>" />

			<img id="pauseButton" src="<?=base_url('assets/img/pause-button.svg')?>" />
		</button>

		<button class="buttonReset">
			<img id="resetButton" src="<?=base_url('assets/img/reset-button.svg')?>" />
		</button>
	</div>
	<a href="<?=base_url('stats')?>" class="btn btn-lg btn-outline-secondary">Statistiques</a>
	<a href="<?=base_url('game')?>" class="btn btn-lg btn-outline-secondary">Game</a>
</div>
<script>
	window.onbeforeunload = function(){
		return 'T\'es sur tu veux partir frerot?';
	};
	var url = "<?=base_url('timer/save')?>";
</script>
<script src="<?=base_url('assets/js/timer.js')?>"></script>