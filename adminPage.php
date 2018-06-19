<html>
	<head>
		<title>Hotel Details Page</title>
	</head>
	
	<body>
	
		<?php
		
			session_start();
			echo "<h2>Welcome " . $_SESSION["username"] . '</h2>';
			$name = $_SESSION["username"];
			
			$url = 'data.json'; // path to your JSON file
			$data = file_get_contents($url); // put the contents of the file into a variable
			$characters = json_decode($data, true); // decode the JSON feed
		?>
		
		<table style="border:1px;">
			<tr style="border: 1px solid black;">
				<th style="border: 1px solid black;">Hotel Name</th>
				<th style="border: 1px solid black;">Hotel Location</th>
				<th style="border: 1px solid black;">Hotel Rating</th>
				<th style="border: 1px solid black;">Confirm Booking</th>
				<th style="border: 1px solid black;">Draft Booking</th>
			</tr>
			<?php
				foreach ($characters['Hotel'] as $character) {
					$nm = $character['name'];
					
					if(strspn($name,$nm) == strlen($nm)){
						echo '<tr style="border: 1px solid black;">';
						echo '<td style="border: 1px solid black;">' . $character['name'] . '</a></td>';
						echo '<td style="border: 1px solid black;">' . $character['location'] . '</td>';
						echo '<td style="border: 1px solid black;">' . $character['rating'] . '</td>';
						echo '<td style="border: 1px solid black;">' . $character['confirmBooking'] . '</td>';
						echo '<td style="border: 1px solid black;">' . $character['draftBooking'] . '</td>';
						//echo '<td style="border: 1px solid black;">' . $character['id'] . '</td>';
						echo '</tr>';					
					}
					
				}
			?>
		</table>
		
	</body>
</html>