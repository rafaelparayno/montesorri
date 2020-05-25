<?php
	session_start();
	if(!isset($_SESSION['username'])){
		 header('Location: system/homepage.php');
	}else{
       header('Location: system/dashboard.php');
    }
?>