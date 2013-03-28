<?php
//THIS CLASS IS FOR KMEANS ALGORITHM
class Kmodes {

	private $data; 			//all data set
	private $iterations;	//number of max iterations
	private $centroids;		//array of centroids
	private $k;				//number of clusters

	//CONSTRUCTOR OF K-MODES ALGORITHM
	public function Kmodes($data_set,$max_iterations/*max cycles*/,$k/*number of centroids*/){
		$this->data = $data_set;
		$this->iterations = $max_iterations;
		$this->centroids= array();
		$this->k = $k;
	}

	private function init_centroids(){			//initialize the first centroids
		if($this->k > sizeof($this->data)){
			return;
		}
		for($i=0;$i<$this->k;$i++){
			$x[$i]= rand(0,sizeof($this->data));
			while($this->val_eq($x)){
				$x[$i]= rand(0,sizeof($this->data));
			}
			$this->centroids[$i]=$this->data[$x[$i]];
		}
	}

	private function val_eq($vector){			//private function to validate 2 centroids are not equals
		for($i=0;$i<sizeof($vector);$i++){
			for($j=($i+1);$j<sizeof($vector);$j++){
				if($vector[$i] == $vector[$j]){
					return true;
				}
			}
		}
		return false;
	}

	private function assign_centroids($data,$centroids){
		$map = array();
		foreach ($data as $row){
			$min_distance = null;
			$min_centroid = null;
			foreach ($centroids as $id=>$value){
				$distance = Utils::levenshtein_distance($row,$value);
				if(is_null($min_distance) || $distance < $min_distance){
					$min_distance = $distance;
					$min_centroid = $id;
				}
			}
			$map[$row->getIndex()] = $min_centroid;
		}
		return $map;
	}

	private function init_centroid($data,$k){			//initialize the first centroids
		$centroids = array();
		if($k > sizeof($data)){
			return;
		}
		for($i=0;$i<$k;$i++){
			$x[$i]= rand(0,sizeof($data));
			while(val_eq($x)){
				$x[$i]= rand(0,sizeof($data));
			}
			$centroids[$i]=$data[$x[$i]];
		}
		return $centroids;
	}

	private function update_centroids($map,$data,$k){
		//METOTH FOR VERIFY
		$centroids = array();
		
	}

	public function start_algorithm(){
		$this->init_centroids();
		$map = array();
		$it=0;
		while($it<$this->iterations){
			$new_map = $this->assign_centroids($this->data,$this->centroids);
			foreach ($new_map as $id=>$object){
				if(!isset($map[$id]) || $object!=$map[$id]){
					$map = $new_map;
					break;
				}
			}
			//$this->centroids = $this->update_centroids($map,$this->data,$this->k);			//aca voy, toca hacer el calculo de los centroides.
			$it++;
		}
		return $map;
	}
}