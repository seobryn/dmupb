<?php
//THIS CLASS IS FOR Data Set INSTANCES
class Data {

	private $index;
	private $parameters; //fields of one register, ex. type_angina, age, chol, num..
	private $predict_field; //specify a predictor field, ex. 'num'

	//CONSTRUCTOR OF Data Set
	public function Data($predict_field,$index){
		if (isset($predict_field)){ 				//validates if $predict_field is not empty
			$this->predict_field = $predict_field;  // set a predict value, selected by user.
		}else{
			$this->predict_field = null;
		}
		$this->parameters = array();				//initialize the parameters of array
		$this->index = $index;
	}
	public function setParameter($key,$value){
		$this->parameters[$key]=$value;				//set parameter to the array
	}
	public function getParameter($key){
		return $this->parameters[$key];				//get parameter to the array
	}

	public function getParameters(){				//get a list of all parameters of array without values
		$params = array();
		foreach ($this->parameters as $key=>$value){
			array_push($params,$key);
		}
		return $params;
	}

	public function getPredictValue(){
		return $this->predict_field;
	}
	
	public function getIndex(){
		return $this->index;
	}
}