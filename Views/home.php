<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
</head>
<body>

	<h2>HOME</h2>
	<ul>
		<li><a href="consult.php">Calcular</a>
		</li>
		<li><a href="../test/test.php">Clear Data Test</a></li>
	</ul>


	<form name="logout" action="../index.php">
		<input name="logout_inp" type="submit" value="logout" />
	</form>
</body>
</html>
