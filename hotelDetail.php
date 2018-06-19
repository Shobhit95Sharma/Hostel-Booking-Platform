<html>
	<head>
		<title>Hotel Details Page</title>
	</head>
	
	<body>
	
		<?php
			session_start();
			echo "<h2>Welcome " . $_SESSION["username"] . '</h2>';

			$url = 'data.json'; // path to your JSON file
			$data = file_get_contents($url); // put the contents of the file into a variable
			$characters = json_decode($data, true); // decode the JSON feed
		?>
		
		<table style="border:1px;">
			<tr style="border: 1px solid black;">
				<th style="border: 1px solid black;">Hotel Name</th>
				<th style="border: 1px solid black;">Hotel Location</th>
				<th style="border: 1px solid black;">Hotel Rating</th>
			</tr>
			<?php
				foreach ($characters['Hotel'] as $character) {
					echo '<tr style="border: 1px solid black;">';
					echo '<td style="border: 1px solid black;"><a href="#" onclick="dispBook(\''.$character['id'].'\')">' . $character['name'] . '</a></td>';
					echo '<td style="border: 1px solid black;">' . $character['location'] . '</td>';
					echo '<td style="border: 1px solid black;">' . $character['rating'] . '</td>';
					//echo '<td style="border: 1px solid black;">' . $character['id'] . '</td>';
					echo '</tr>';					
				}
			?>
		</table>
		
		<div id="booking" style="display:none">
			<form action="Confirmbooking.php" method="GET">
				<div>
				<table>
				<tr>
				<td>
					<label style="padding-left:10px;">
						<font>Name
					</label>
					</td><td>
					<input style="padding-left:10px;" type="text" class="form-control" value="<?php $username?>" name="username"><br>
				</td></tr>
				<tr><td>
					<label style="padding-left:10px;">
						From
					</label>
					</td><td>
					<input style="padding-left:10px;" type="date" class="form-control"  value="<?php $from?>" name="from"><br>
					</td></tr>
					<tr><td>
					<label style="padding-left:10px;" >
						To
					</label>
					</td><td>
					<input style="padding-left:10px;" type="date" class="form-control"  value="<?php $to?>" name="to"><br>
					</td></tr>
					<tr><td>
					<label style="padding-left:10px;">
						#Room
					</label>
					</td><td>
					<input style="padding-left:10px;" type="number" class="form-control"  value="<?php $from?>" name="from"><br>
					</td>
					</tr></table>
					<input type="submit" class="btn btn-default" value="Confirm">
				</div>
			</form>
			
			<form action="draftBooking.php" method="get">
				<input type="submit"  class ="btn btn-warning" value="Cancel">
			</form>	
		</div>
		
		<div id="recom">
			<?php include 'recom.php'; ?>
		</div>
		
		
		<script type="text/javascript">
			function dispBook(id){
				//alert(id);
				document.cookie = "id="+id; 
				document.getElementById('booking').style.display = 'block';
			}
		</script>
		
	</body>
</html>