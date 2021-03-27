<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title><?=!empty($title) ? $title : 'Time to Flush'?></title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/css/timer.css')?>" rel="stylesheet">
		<script src="<?=base_url('assets/js/jquery.min.js')?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/bootstrap.min.js')?>" type="text/javascript"></script>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;900&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,300;1,300&display=swap" rel="stylesheet" />
		<link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>⏳</text></svg>" />
	</head>
	<body>