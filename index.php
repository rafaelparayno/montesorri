<?php
ob_start();
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: system/homepage.php');
} else {
	header('Location: system/pages/dashboard.php');
}
