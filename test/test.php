<!-- THIS PAGE IS ONLY FOR TEST -->
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>DMUPB -- Test Page</title>
</head>
<body>
	<form name="test_form" action="test.php" method="post"
		enctype="multipart/form-data">
		<input type="file" name="file_path" /><br /> <input type="text"
			value="" name="txt_predict"> <input type="submit" name="send"
			value="test">
	</form>
	<?php
	echo "<a href='../views/home.php'>Go Home</a><br />";
	if(isset($_POST) && !empty($_POST)){
		include_once '../classes/Data.class.php';
		include_once '../classes/Utils.class.php';
		include_once '../classes/FileRead.class.php';
		$temp = new FileRead();
		$array_data = $temp->read($_FILES['file_path']['tmp_name'],$_POST["txt_predict"]);
		$array_data = Utils::clean_data($array_data);
		$types = $temp->getDataTypes();
		$pl = $array_data[0]->getParameters();
		$i=0;
		echo "<hr>";
		foreach ($pl as $paramet){
				echo $paramet." => ".$types[$i++]."<br />";
		}
		echo "<hr>";
		foreach ($array_data as $key=>$value){
			echo ($key+1)." => ";
			$pl = $value->getParameters();
			foreach ($pl as $paramet){
					echo $value->getParameter($paramet)." ";
				}
				echo "<br/>";
		}
	}
	?>
</body>
</html>
