<?php include('loadData.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">          
	<head>
		<link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon" />
	    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>ArduTemp</title>

		<link rel="stylesheet" href="style.css">
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

		<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="http://code.highcharts.com/stock/highstock.js"></script>
		<?php include('graph.js'); ?>

	</head>

	<body>		
		<div id="container"></div>
		<div class="stat shadow">
			<h1>Aktuelle Werte:</h1>
			<span><a class="temp"><?php echo round($curTemp, 2); ?> °C</a></a></span>
			<span><a class="pressure"><?php echo round($curPressure, 2); ?> hPa</a></span>
			<span><a class="time">letzter Messwert: <?php echo gmdate("H:i:s", $time+2*60*60); ?></a></span>

		</div>
		<div class="stat shadow">
			<h1>Tagesdurchschnitt:</h1>
			<span><a class="temp"><?php echo round($dayTemp, 2); ?> °C</a></span>
			<span><a class="pressure"><?php echo round($dayPressure, 2); ?> hPa</a></span>
			<span><a class="max temp"><?php echo round($dayMinTemp, 2).'/'.round($dayMaxTemp, 2); ?> °C (min/max)</a></span>
			<span><a class="min pressure"><?php echo round($dayMinPressure, 2).'/'.round($dayMaxPressure, 2); ?> hPa (min/max)</a></span>
		</div>
		<div class="stat shadow">
			<h1>Monatsdurchschnitt:</h1>
			<span><a class="temp"><?php echo round($monthTemp, 2); ?> °C</a></span>
			<span><a class="pressure"><?php echo round($monthPressure, 2); ?> hPa</a></span>
			<span><a class="max temp"><?php echo round($monthMinTemp, 2).'/'.round($monthMaxTemp, 2); ?> °C (min/max)</a></span>
			<span><a class="min pressure"><?php echo round($monthMinPressure, 2).'/'.round($monthMaxPressure, 2); ?> hPa (min/max)</a></span>
		</div>
	</body>
</html>