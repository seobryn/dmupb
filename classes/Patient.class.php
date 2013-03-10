<?php

class Patient {

	private $age;
	private $sex;
	private $cp;
	private $trestbps;
	private $chol;
	private $fbs;
	private $restecg;
	private $thalach;
	private $exang;
	private $oldpeak;
	private $slope;
	private $ca;
	private $thal;
	private $num;


	public function Patient(){

	}

	//Age getter and setter
	function getAge () {
	 return $this->age;
	}

	function setAge ($age) {
	 $this->age = $age;
	}

	//Gender getter and setter
	function getSex () {
	 return $this->sex;
	}

	function setSex ($sex) {
	 $this->sex = $sex;
	}

	//field getter and setter
	function getCp () {
	 return $this->cp;
	}

	function setCp ($cp) {
	 $this->cp = $cp;
	}

	//Trestbps getter and setter
	function getTrestbps () {
	 return $this->trestbps;
	}

	function setTrestbps ($trestbps) {
	 $this->trestbps = $trestbps;
	}

	//Chol getter and setter
	function getChol () {
	 return $this->chol;
	}

	function setChol ($chol) {
	 $this->chol = $chol;
	}

	//$fieldVar getter and setter
	function getFbs () {
	 return $this->fbs;
	}

	function setFbs ($fbs) {
	 $this->fbs = $fbs;
	}

	//restecg getter and setter
	function getRestecg () {
	 return $this->restecg;
	}

	function setRestecg ($restecg) {
	 $this->restecg = $restecg;
	}

	//$fieldVar getter and setter
	function getThalach () {
	 return $this->thalach;
	}

	function setThalach ($thalach) {
	 $this->thalach = $thalach;
	}

	//exang getter and setter
	function getExang () {
	 return $this->exang;
	}

	function setExang ($exang) {
	 $this->exang = $exang;
	}

	//oldpeak getter and setter
	function getOldpeak () {
	 return $this->oldpeak;
	}

	function setOldpeak ($oldpeak) {
	 $this->oldpeak = $oldpeak;
	}

	//slope getter and setter
	function getSlope () {
	 return $this->slope;
	}

	function setSlope ($slope) {
	 $this->slope = $slope;
	}

	//ca getter and setter
	function getCa () {
	 return $this->ca;
	}

	function setCa ($ca) {
	 $this->ca = $ca;
	}

	//thal getter and setter
	function getThal () {
	 return $this->thal;
	}

	function setThal ($thal) {
	 $this->thal = $thal;
	}

	//num getter and setter
	function getNum () {
	 return $this->num;
	}

	function setNum ($num) {
	 $this->num = $num;
	}

}