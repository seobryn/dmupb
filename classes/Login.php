<?php

include '../classes/Db.php';


// http://www.phpeasystep.com/phptu/6.html
function loginQuery($acc, $pss){

	dbConnection();

	$account  = stripcslashes($acc);
	$password = stripcslashes($pss);

	$account  = mysql_real_escape_string($account);
	$password = mysql_real_escape_string($password);

	$sql = "SELECT account, password
			FROM User
			WHERE account='".$account."' AND password='".$password."'";
	$result = mysql_query($sql);
	$count=mysql_num_rows($result);

	if(mysql_num_rows($result) == 1){
		session_start();
		$_SESSION['account'] = $account;

		header('Location: ../Views/home.php');

	}else {
		echo 'Wrong Account or Password';
	}

	ob_end_flush();

}