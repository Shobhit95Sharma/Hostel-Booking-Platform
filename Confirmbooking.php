<?php
	$coo = '';
    if (isset($_COOKIE["id"]))
      $coo = $_COOKIE["id"];
    else
       echo "Action could not complete \n Please Try Again sometime";
   
	$url = 'data.json'; // path to your JSON file
	$data = file_get_contents($url); // put the contents of the file into a variable
	$characters = json_decode($data, true); // decode the JSON feed
	
	$counter = 0;
	foreach ($characters['Hotel'] as $character) {
		if($character['id'] == $coo){
			break;
		}
		$counter++;
	}
	echo $counter;
	
	$num = (int)$characters['Hotel'][$counter]['confirmBooking'];
	$characters['Hotel'][$counter]['confirmBooking'] = (string)($num+1);

	$newJsonString = json_encode($characters,true);
	file_put_contents($url, $newJsonString);
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>