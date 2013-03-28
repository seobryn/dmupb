<?php
//THIS CLASS IS FOR UTILITIES, CONVERSIONS AND CALCULATE DISTANCES
class Utils{

	public static function levenshtein_distance($vector1/*Type Data*/,$vector2/*Type Data*/){
		if(Utils::validate_size($vector1->getParameters(),$vector2->getParameters())){
			echo "ERROR: cluster must have the same dimension";
			exit();
		}			
		$iterator = $vector1->getParameters();
		$result=0;
		foreach ($iterator as $index){
			$result+= levenshtein($vector1->getParameter($index),$vector2->getParameter($index));
		}		
		return $result/sizeof($iterator);
	}
	
	//this method compare the size of two vectors, if it equals return true otherwise return false
	private static function validate_size($v1,$v2){
		if(sizeof($v1)!= sizeof($v2)){
			return true;
		}else{
			return false;
		}
	}

	//this method predicts a value of an incomplete register, taking into consideration a predictor value
	public static function predict($field /*name of Field*/,$array_registers /*type: patient*/,$predictor/*predictor field*/,$predictor_value/*actual predictor value*/){
		foreach ($array_registers as  $value){
			if(($value->getParameter($field)!="?") && ($value->getParameter($predictor)==$predictor_value)){
				return $value->getParameter($field);
			}
		}
		return "?";
	}
	//this method clean the impure data set
	public static function clean_data($array_data){
		$fields = $array_data[0]->getParameters();
		$predict_value = $array_data[0]->getPredictValue();
		for ($i=0;$i<sizeof($array_data);$i++){
			foreach ($fields as $f){
				if($array_data[$i]->getParameter($f)=="?"){
					$tmp = Utils::predict($f,$array_data,$predict_value,$array_data[$i]->getParameter($predict_value));
					$array_data[$i]->setParameter($f,$tmp);
				}
			}
		}
		return $array_data;
	}
}
?>