<?php
      include ( './includes/header.php' );
      $username = $_GET['u'];
      $check_username = mysql_query("SELECT * FROM users WHERE username='$username'");
      $count  = mysql_num_rows($check_username);
      
      if ($count == 1) {
            while ($row = mysql_fetch_assoc($check_username)) {
                  $id = $row['id'];
                  $firstname = $row['firstname'];
                  $lastname = $row['lastname'];
                  $username = $row['username'];
                  $email = $row['email'];
                  $password = $row['password'];
                  $date_of_birth = $row['dob'];

                  echo "<h2>$username's Profile</h2><br /> Name: $firstname $lastname<br /> Email: $email ";
            }
      }
      
      else{
       header("Location: index.php");
      }
?>