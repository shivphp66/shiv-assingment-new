<?php 
    session_start();
	
		 unset($_SESSION['uid']);
		 unset($_SESSION['user_name']);
		 unset($_SESSION['user_roll']);
         session_destroy();		 
		 header('location:index.php');
	  
	?>
