<?php
class Utils{

	public static function calculate_euclidean($vector1,$vector2){
		if(Utils::validate_size($vector1,$vector2)){
			return "ERROR: Vectors should be of equal length: vector1=".sizeof($vector1)." vector2=".sizeof($vector2);
		}
		for ($i=0;$i<sizeof($vector1);$i++){
			$temp= $vector1[$i]-$vector2[$i];
			$temp*=$temp;
			$output+=$temp;
		}
		unset($temp);
		return sqrt($output);
	}

	public static function calculate_qeuclidean($vector1,$vector2){
		if(Utils::validate_size($vector1,$vector2)){
			return "ERROR: Vectors should be of equal length: vector1=".sizeof($vector1)." vector2=".sizeof($vector2);
		}
		for ($i=0;$i<sizeof($vector1);$i++){
			$temp= $vector1[$i]-$vector2[$i];
			$temp*=$temp;
			$output+=$temp;
		}
		unset($temp);
		return $output;
	}

	public static function calculate_manhathan($vector1,$vector2){
		if(Utils::validate_size($vector1,$vector2)){
			return "ERROR: Vectors should be of equal length: vector1=".sizeof($vector1)." vector2=".sizeof($vector2);
		}
		for ($i=0;$i<sizeof($vector1);$i++){
			$output+=abs($vector1[$i]-$vector2[$i]);
		}
		return $output;
	}

	public static function predict($field /*name of Field*/,$array_registers /*type: patient*/,$predictor){
		switch ($field){
			case 'age' :
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getAge()!="?"){
						return $comparator->getAge();
					}
				}
				break;
			case 'sex' :
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getSex()!="?"){
						return $comparator->getSex();
					}
				}
				break;
			case 'cp':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getCp()!="?"){
						return $comparator->getCp();
					}
				}
				break;
			case 'trestbps':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getTrestbps()!="?"){
						return $comparator->getTrestbps();
					}
				}
				break;
			case 'chol':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getChol()!="?"){
						return $comparator->getChol();
					}
				}
				break;
			case 'fbs':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getFbs()!="?"){
						return $comparator->getFbs();
					}
				}
				break;
			case 'restecg':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getRestecg()!="?"){
						return $comparator->getRestecg();
					}
				}
				break;
			case 'thalach':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getThalach()!="?"){
						return $comparator->getThalach();
					}
				}
				break;
			case 'exang':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getExang()!="?"){
						return $comparator->getExang();
					}
				}
				break;
			case 'oldpeak':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getOldpeak()!="?"){
						return $comparator->getOldpeak();
					}
				}
				break;
			case 'slope':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getSlope()!="?"){
						return $comparator->getSlope();
					}
				}
				break;
			case 'ca':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getCa()!="?"){
						return $comparator->getCa();
					}
				}
				break;
			case 'thal':
				foreach ($array_registers as $comparator){
					if($comparator->getNum()==$predictor && $comparator->getThal()!="?"){
						return $comparator->getThal();
					}
				}
				break;
			default:
				return "?";
				break;
		}
	}

	private static function validate_size($v1,$v2){
		if(sizeof($v1)!= sizeof($v2)){
			return true;
		}else{
			return false;
		}
	}
}
?>