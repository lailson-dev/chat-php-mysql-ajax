<?php 

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'chat';

	try {

	    $conn = new PDO('mysql:host=localhost;dbname='. $db, $user, $pass);
	    $conn->exec("set names utf8");
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    
	} catch(PDOException $e) {

	    echo 'Houve um erro ao tentar conectar-se com o banco de dados: ' . $e->getMessage();
	}

	date_default_timezone_set('America/Sao_Paulo');
	$globalData = date("d/m/Y");
	$globalHours = date("H:i");
	$showName = false;

	if(isset($_SESSION['user']) && $_SESSION['user'] != null) {
		$actualName = $_SESSION['name'];
		$actualUser = $_SESSION['user'];
		$showName = true;
	}
