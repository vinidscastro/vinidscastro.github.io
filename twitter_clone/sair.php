<?php
	session_start();

	unset($_SESSION['usuario']);
	unset($_SESSION['email']);

	if(!isset($_SESSION['usuario'])){
	header('location: index.php');
}

?>