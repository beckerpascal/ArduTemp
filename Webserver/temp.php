<?php
	include('connect.php');

	$link = mysqli_connect($server, $user, $pw, $db);
	if (!$link) {
	    die('Verbindung schlug fehl: ' . mysqli_error());
	}
	echo 'Erfolgreich verbunden<br><br>';

	$temp = $_POST['temp'];
	$pressure = $_POST['pressure'];
	if($temp == NULL){
		$temp = 0;
	}
	if($pressure == NULL){
		$pressure = 0;
	}

	if(isset($temp)){
		echo 'Daten erhalten';
		$query = "INSERT INTO temp (timestamp, temp, pressure) VALUES (NOW(), ".$temp.", ".$pressure.")";
		echo $query;
		if (!mysqli_query($link,$query)) {
				die('Error: ' . mysqli_error($link));
		}	
	}else{
		echo 'Keine Daten erhalten';
		echo $temp.'b';
	}

	mysqli_close($link);



?>