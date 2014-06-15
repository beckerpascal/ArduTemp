<?php

include('connect.php');

$curTemp;
$curPressure;
$dayTemp;
$dayPressure;
$dayCounter;
$monthTemp;
$monthPressure;
$monthCounter;
$dayMinTemp = 100;
$dayMaxTemp;
$dayMinPressure = 10000;
$dayMaxPressure;
$monthMinTemp = 100;
$monthMaxTemp;
$monthMinPressure = 10000;
$monthMaxPressure;

$connection = mysql_connect($localhost, $user, $pw);
if (!$connection) {
    die('Could not connect: ' . mysql_error());
} else {
    $dbcheck = mysql_select_db($db);
    if (!$dbcheck) {
        echo mysql_error();
    }
}

	$allocation = $_GET['alloc'];
	$type = $_GET['type'];
	
	switch ($allocation) {
		case '':
			$allocation = 'occupied';
			break;
		case 'free':
			break;
		case 'occupied':
			break;
		default:
			$allocation = 'occupied';
			break;
	}

	$sql = 'SELECT timestamp, temp, pressure FROM temp ORDER BY timestamp';
    $result = mysql_query($sql);
	if (!$result) {
	    $message  = 'Ungültige Abfrage: ' . mysql_error() . "\n";
	    $message .= 'Gesamte Abfrage: ' . $query;
	    die($message);
	}

	$oneDay = 24 * 60 * 60 ;
	$now = time();
	$time = 0;

	while ($row = mysql_fetch_row($result)) {
		$time = strtotime($row[0]);
		$measureTime = strtotime($row[0]) *1000 + 2*60*60*1000; // convert from Unix timestamp to JavaScript time
		$temp[] = '['.$measureTime.', '.$row[1].']';
		$pressure[] = '['.$measureTime.', '.$row[2].']';
		if($curTime > $lastDayTime){
			$dayTemp += $row[1];
			$dayPressure += $row[2];
			$dayCounter++;
		}
		if($now - $oneDay < $time){
			$dayTemp += $row[1];
			$dayPressure += $row[2];
			$dayCounter++;

			$dayMinTemp = min($row[1], $dayMinTemp);
			$dayMaxTemp = max($row[1], $dayMaxTemp);
			$dayMinPressure = min($row[2], $dayMinPressure);
			$dayMaxPressure = max($row[2], $dayMaxPressure);
		}
		if($now - 30 * $oneDay < $time){
			$monthTemp += $row[1];
			$monthPressure += $row[2];
			$monthCounter++;

			$monthMinTemp = min($row[1], $monthMinTemp);
			$monthMaxTemp = max($row[1], $monthMaxTemp);
			$monthMinPressure = min($row[2], $monthMinPressure);
			$monthMaxPressure = max($row[2], $monthMaxPressure);
		}	
	}

	$curTemp = substr(explode(',', $temp[sizeof($temp)-1])[1], 0, -1);
	$curPressure = substr(explode(',', $pressure[sizeof($pressure)-1])[1], 0, -1);

	$dayTemp = $dayTemp/$dayCounter;
	$dayPressure = $dayPressure/$dayCounter;

	$monthTemp = $monthTemp/$monthCounter;
	$monthPressure = $monthPressure/$monthCounter;

	mysql_close($connection);
?>