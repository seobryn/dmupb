<?php
header('Content-Type: text/html; charset=utf-8');
require_once '../application/inc/import.inc.php';
try {
	date_default_timezone_set("America/Bogota");
	@session_start();
	//Validar Variables de Session.
	if(true) {
		//validar Session
		if(true) {
			//validar Tiempo de Session.
			if(true){
				//Reiniciar Tiempo de Session.
			} else {
				@session_unset();
				@session_destroy();
				header("Location: ". '?msg=0');
			}
		} else {
			@session_unset();
			@session_destroy();
			header("Location: error.php" . '?msg=2');
		}
	} else {
		//Inciar una Session.
	}
	//Validar varibles de Nav.
	if(isset($_GET) and !empty($_GET)) {
		$method = (empty($_GET['method']) or !isset($_GET['method'])) ? "deploy" : $_GET['method'];
		$controllerName = ucfirst((empty($_GET['controller']) or !isset($_GET['controller'])) ? "login" : $_GET['controller']);
		if (file_exists('../application/controller/'.$controllerName.'_Controller.class.php')) {
			require_once('../application/controller/'.$controllerName.'_Controller.class.php');
			$args = ""; //variable para manejo de comentarios
			$constructor = $controllerName.'_Controller';
			$controller = new $constructor($args);
			require_once($controller->$method());
		} else {
			header("Location: error.php" . '?msg=error');
		}
	} else {
		header("Location: index.php?controller=login");
	}
}
catch (Exception $e) {
	header("Location: " . '?msg=-1');
}

?>