<?php
//THIS CLASS IS FOR Data Set INSTANCES
class Data {

	private $parameters;
	private $predict_field;

	//CONSTRUCTOR OF Data Set
	public function Data($predict_field){
		$this->predict_field = $predict_field;
		$this->parameters = array();
	}
	public function setParameter($key,$value){
		$this->parameters[$key]=$value;
	}
	public function getParameter($key){
		return $this->parameters[$key];
	}
	
	public function getParameters(){
		$params = array();
		foreach ($this->parameters as $key=>$value){
			array_push($params,$key);
		}
		return $params;
	}
	
	public function getPredictValue(){
		return $this->predict_field;
	}
}