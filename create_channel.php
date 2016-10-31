<?php
	include ( './includes/header.php' );

	//Checking if the channel can be created
	if (isset($_POST['create_channel'])) {
	$channel_name = @$_POST['channel_name'];
	$date = date("Y-m-d");
	$channel_check = mysql_query("SELECT channel_name FROM channels WHERE created_by='$user'");
	$numrows_cc = mysql_num_rows($channel_check);
	
		if ($numrows_cc < 5) {
		$channel_name_db = mysql_query("SELECT channel_name FROM channels WHERE channel_name='$channel_name'");
		$numrows = mysql_num_rows($channel_name_db);
			if ($numrows != 0) {
			  echo 'That channel already exists';
			}

			else if ($channel_name == '') {
			  echo '';
			}

			else {
			$create_channel = mysql_query("INSERT INTO channels VALUES ('','$channel_name','$user','$date')");
			echo "Your channel was created succesfully";
			}
		}
		else
		{
		 echo 'You can only create 5 channels per account.'; 
		}
	}
?>

<h2>Create Your Channel</h2>
	<form action='create_channel.php' method='POST'>
		<input type='text' size='40' maxlength='32' name='channel_name' 
		value='Name your channel...'  onclick='value="" ' />
		<input type='submit' name='create_channel' value='Create Channel'>
	</form>