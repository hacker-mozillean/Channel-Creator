<?php
	include ( './includes/header.php' );
	
	$channel = $_GET['c'];
	$check_channel = mysql_query("SELECT * FROM channels WHERE channel_name='$channel'");
	$count  = mysql_num_rows($check_channel);
	
	if ($count == 1) {
		while ($row = mysql_fetch_assoc($check_channel)) {
		      $id = $row['id'];
		      $channel_name = $row['channel_name'];
		      $created_by = $row['created_by'];
		      $date_created = $row['date_created'];

?>

	<div class='channeloptions'>
		<h2>Please share your Channel Name</h2>

		<center> <img src='#' height='140' width='140' /> </center>
		
		<p> This is a channel profile page. This is a channel profile page. 
		This is a channel profile page. This is a channel profile page. 
		This is a channel profile page. This is a channel profile page. 
		This is a channel profile page. This is a channel profile page. 
		This is a channel profile page.	This is a channel profile page. </p>
	</div>

	<!--This div element contains the channels videos-->
	<div class='channelvideocontainer'>
		<img src='#' height='100' width='180' />
		<img src='#' height='100' width='180' />
		<img src='#' height='100' width='180' />
		<img src='#' height='100' width='180' />
		<img src='#' height='100' width='180' />
		<img src='#' height='100' width='180' />
		<img src='#' height='100' width='180' />
		<img src='#' height='100' width='180' />
		<img src='#' height='100' width='180' />
		<img src='#' height='100' width='180' />
		<img src='#' height='100' width='180' />
		<img src='#' height='100' width='180' />
	</div>

	<?php 
	}
	}

	else {
	 header("Location: index.php");
	}

?>