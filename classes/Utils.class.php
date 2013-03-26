<?php
//THIS CLASS IS FOR UTILITIES, CONVERSIONS AND CALCULATE DISTANCES
class Utils{

	//this method calculate the euclidean distances between two vectors with same length
	public static function calculate_euclidean($vector1,$vector2){

		//validate if lenghts are equals
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
	//this method calculate the square euclidean distances between two vectors with same length
	public static function calculate_qeuclidean($vector1,$vector2){
		//validate if lenghts are equals
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
	//this method calculate the manhathan distances between two vectors with same length
	public static function calculate_manhathan($vector1,$vector2){
		//validate if lengths are equals
		if(Utils::validate_size($vector1,$vector2)){
			return "ERROR: Vectors should be of equal length: vector1=".sizeof($vector1)." vector2=".sizeof($vector2);
		}
		for ($i=0;$i<sizeof($vector1);$i++){
			$output+=abs($vector1[$i]-$vector2[$i]);
		}
		return $output;
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