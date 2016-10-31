<?php
	include ( './includes/header.php' );

	if (isset($_POST['create_channel'])) {
	 header("Location: create_channel.php"); 
	} 
	
	//Checking whether some channel is being created
	$channel_check = mysql_query("SELECT channel_name FROM channels WHERE created_by='$user'");
	$numrows_cc = mysql_num_rows($channel_check);

	if ($numrows_cc == 0) {
	echo ''; // They don't have any channels so they need to create one
?>

	 <p> You haven't made any channels yet, click the button to make one.<p>
		 <form action='create_channel.php'>
		 	<input type='submit' name='goto_channel_create' value='Create my Channel' />
		 </form>
	<?php }
	
	else{
	  while($row = mysql_fetch_assoc($channel_check)) {
	  $channel_name = $row['channel_name'];
	  echo "<b>$channel_name</b> - <a href='channel.php?c=$channel_name'>View Channel</a><p />";
	}//End of 
	
	echo "$numrows_cc/5 Channels Created";
	}
?>