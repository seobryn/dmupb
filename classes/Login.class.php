<?php
//THIS IS A DB CONNECTION FOR LOGIN PAGE
include_once '../classes/Db.class.php';
class Login {
	
	static $connection;

	static function loginQuery($acc, $pss){

		$connection = Db::dbConnection();

		$account  = stripcslashes($acc);
		$password = stripcslashes($pss);

		$account  = mysql_real_escape_string($account);
		$password = mysql_real_escape_string($password);

		$sql = "SELECT account, password
				FROM user
				WHERE account='".$account."' AND password='".$password."'";
		$result = mysql_query($sql);
		$count=mysql_num_rows($result);

		if(mysql_num_rows($result) == 1){
			session_start();
			$_SESSION['account'] = $account;

			header('Location: ../views/home.php');

		}else {
			echo 'Wrong Account or Password';
		}

		ob_end_flush();

	}

	static function logout(){
		Db::dbDisconnect($connection);
	}
}
?>
