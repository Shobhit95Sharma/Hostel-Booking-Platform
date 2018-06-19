<?php

	$rating='';
	$location='';
	$name='';
	if (isset($_COOKIE["id"])){
		$coo = $_COOKIE["id"];
		foreach ($characters['Hotel'] as $character) {
		if($character['id'] == $coo){
			$name = $character['name'];
			$rating = $character['rating'];
			$location = $character['location'];
			break;
		}
		}
		echo '<h4>Hotel recommendations by location and/or rating <br>';
		echo '<table style="border:1px;"><tr>';
		foreach ($characters['Hotel'] as $character) {
			if($character['name']==$name || $character['location']==$location || $character['rating'] == $rating)
			echo '<td style="border: 1px solid black;padding-right:10px;text-align:center">' . $character['name'] .'<br>'. $character['location'] .'<br>Rating:'. $character['rating']. '</td>';
		}
		echo '</tr></table>';
	}
?>