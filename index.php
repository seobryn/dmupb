<?php

if(isset($_POST) && !empty($_POST)) {
	session_start();
	session_destroy();
}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>DMUPB</title>
</head>
<body>

	<form name="login" action="controller/Login.php" method="post">
		<dl>
			<dd>
				<label>Account: </label>
			</dd>
			<dt>
				<input name="acc_inp" type="text" value="" />
			</dt>
			<dd>
				<label>Password: </label>
			</dd>
			<dt>
				<input name="pss_inp" type="password" value="" />
			</dt>
		</dl>
		<input name="sup_inp" type="submit" value="Sing Up" />
	</form>
</body>
</html>
