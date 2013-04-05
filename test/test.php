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
		include_once '../classes/Kmodes_algorithm.class.php';
		$temp = new FileRead();
		$array_data = $temp->read($_FILES['file_path']['tmp_name'],$_POST["txt_predict"]);
		$array_data = Utils::clean_data($array_data);
		$types = $temp->getDataTypes();
		$pl = $array_data[0]->getParameters();
		$km_alg = new Kmodes($array_data,10,4);
		$test = $km_alg->start_algorithm();
		echo "<h2>Centroids: </h2>";
		foreach ($test['centroids'] as $centroids){
			var_dump($centroids);
			echo "<br/><br/>";
		}
		echo "<h2>Values for each Cluster</h2>";
		$i=0;
		foreach ($test['clusters'] as $values){
			echo "<h3>Cluster ".++$i.":</h3><br/>";
			foreach ($values as $val){
				var_dump($val);
				echo "<br/><br/>";
			}
		}
	}
	?>
</body>
</html>
