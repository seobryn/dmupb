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
		<input type="file" name="file_path" /><br /> <input type="submit"
			name="send" value="test">
	</form>
	<?php
	echo "<a href='../views/home.php'>Go Home</a><br />";
	if(isset($_POST) && !empty($_POST)){
		include_once '../classes/Patient.class.php';
		include_once '../classes/Utils.class.php';
		include_once '../classes/FileRead.class.php';
		$temp = new FileRead();
		$array_data = $temp->read($_FILES['file_path']['tmp_name']);
		$array_data = Utils::clean_data($array_data);
		foreach ($array_data as $pop_data){
			echo  $pop_data->getAge().",".$pop_data->getSex().",".$pop_data->getCp().",".
					$pop_data->getTrestbps().",".$pop_data->getChol().",".$pop_data->getFbs().",".
					$pop_data->getRestecg().",".$pop_data->getThalach().",".$pop_data->getExang().",".
					$pop_data->getOldpeak().",".$pop_data->getSlope().",".$pop_data->getCa().",".
					$pop_data->getThal().",".$pop_data->getNum()."<br />";
		}
	}
	?>
</body>
</html>
