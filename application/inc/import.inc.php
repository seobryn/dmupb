<?php
require_once '../library/mysql/MysqlDriver.class.php';
require_once '../application/config/config.php';
require_once '../application/controller/View_Controller.class.php';
if($_GET['controller']=='login'){
	require_once '../application/controller/Login_Controller.class.php';
}
if($_GET['controller']=='consult'){
	if($_GET['method']=='exec'){
		require_once '../application/model/Data.class.php';
		require_once '../application/model/Utils.class.php';
		require_once '../application/model/FileRead.class.php';
		if ($_POST['alg_inp']=='GKmodes'){
			require_once '../application/model/GKmodes_algorithm.class.php';
		}
		if($_POST['alg_inp']=='Algorithm'){
			require_once '../application/model/Algorithm.class.php';
		}
	}
	require_once '../application/controller/Consult_Controller.class.php';
}
if($_GET['controller']=='home'){
	require_once '../application/controller/Home_Controller.class.php';
}
?>