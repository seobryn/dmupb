<?php
class Distances{
	public static function calculate_euclidean($vector1,$vector2){
		if(Distances::validate_size($vector1,$vector2)){
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
		if(Distances::validate_size($vector1,$vector2)){
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
		if(Distances::validate_size($vector1,$vector2)){
			return "ERROR: Vectors should be of equal length: vector1=".sizeof($vector1)." vector2=".sizeof($vector2);
		}
		for ($i=0;$i<sizeof($vector1);$i++){
			$output+=abs($vector1[$i]-$vector2[$i]);
		}
		return $output;
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