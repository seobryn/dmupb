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
		$file=fOpen($_FILES['file_path']['tmp_name'],"r") or exit("Unable to open the file!");
		$patients = array();
		while (!feof($file)){
			$line = fgets($file);
			if(!(substr($line,0,1)=="@") and !(substr($line,0,1)=="%")){
				$patient = new Patient();
				$tmp = explode(',',$line);
				$patient->setAge(trim($tmp[0]));
				$patient->setSex(trim($tmp[1]));
				$patient->setCp(trim($tmp[2]));
				$patient->setTrestbps(trim($tmp[3]));
				$patient->setChol(trim($tmp[4]));
				$patient->setFbs(trim($tmp[5]));
				$patient->setRestecg(trim($tmp[6]));
				$patient->setThalach(trim($tmp[7]));
				$patient->setExang(trim($tmp[8]));
				$patient->setOldpeak(trim($tmp[9]));
				$patient->setSlope(trim($tmp[10]));
				$patient->setCa(trim($tmp[11]));
				$patient->setThal(trim($tmp[12]));
				$patient->setNum(trim($tmp[13]));
				array_push($patients, $patient);
			}
		}
		fclose();
		foreach ($patients as $row){
			if($row->getAge()=="?"){
				$row->setAge(Utils::predict('age',$patients,$row->getNum()));
			}
			if($row->getSex()=="?"){
				$row->setSex(Utils::predict('sex',$patients,$row->getNum()));
			}
			if($row->getCp()=="?"){
				$row-setCp(Utils::predict('cp',$patients,$row->getNum()));
			}
			if($row->getTrestbps()=='?'){
				$row->setTrestbps(Utils::predict('trestbps',$patients,$row->getNum()));
			}
			if($row->getChol()=="?"){
				$row->setChol(Utils::predict('chol',$patients,$row->getNum()));
			}
			if($row->getFbs()=="?"){
				$row->setFbs(Utils::predict('fbs',$patients,$row->getNum()));
			}
			if($row->getRestecg()=="?"){
				$row->setRestecg(Utils::predict('restecg',$patients,$row->getNum()));
			}
			if($row->getThalach()=="?"){
				$row->setThalach(Utils::predict('thalach',$patients,$row->getNum()));
			}
			if($row->getExang()=="?"){
				$row->setExang(Utils::predict('exang',$patients,$row->getNum()));
			}
			if($row->getOldpeak()=="?"){
				$row->setOldpeak(Utils::predict('oldpeak',$patients,$row->getNum()));
			}
			if($row->getSlope()=="?"){
				$row->setSlope(Utils::predict('slope',$patients,$row->getNum()));
			}
			if($row->getCa()=="?"){
				$row->setCa(Utils::predict('ca',$patients,$row->getNum()));
			}
			if($row->getThal()=="?"){
				$row->setThal(Utils::predict('thal',$patients,$row->getNum()));
			}
			echo $row->getAge().",".$row->getSex().",".$row->getCp().",".$row->getTrestbps().",".$row->getChol().",".
					$row->getFbs().",".$row->getRestecg().",".$row->getThalach().",".$row->getExang().",".$row->getOldpeak().",".
					$row->getSlope().",".$row->getCa().",".$row->getThal().",".$row->getNum()." <br />";
		}
		echo "----------CLEAR DATA (ONLY FOR TEST)------------<br />LENGHT OF REGISTERS: ".sizeof($patients);
	}
	?>
</body>
</html>
