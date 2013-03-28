<?php
//THIS CLASS IS FOR KMEANS ALGORITHM
class Kmodes {

	private $data; 			//all data set
	private $iterations;	//number of max iterations
	private $centroids;		//array of centroids
	private $k;				//number of clusters
	private $result;		//formatted results
	private $chaged;		//boolean flag

	//CONSTRUCTOR OF K-MODES ALGORITHM
	public function Kmodes($data_set/*data set read by archive file*/,$max_iterations/*max cycles*/,$k/*number of centroids*/){
		if(!isset($data_set)){
			echo "ERROR: Data set is necessary to run the algorithm.<br/>Please, Try again with all required data.";
			exit();
		}
		if(!isset($max_iterations) || ($max_iterations=="") || empty($max_iterations)){
			$this->iterations = 20;
		}else{
			$this->iterations = $max_iterations;
		}
		$this->data = $data_set;
		$this->centroids= array();
		if(!isset($k)|| empty($k)){
			$this->k = 6;
		}else{
			$this->k = $k;
		}
		$this->result = array();
		$this->changed = false;
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

	private function update_centroids($map,$k){
		//METOTH FOR VERIFY
		$centroids = array();
		$distances = array();
		foreach ($map as $dat=>$centroid){
			$distances[$centroid][$dat] = Utils::levenshtein_distance($this->data[$dat],$this->centroids[$centroid]);
		}
		$avg_distance = array();
		foreach ($distances as $key=>$vector){
			$avg_distance[$key] = (array_sum($vector)/sizeof($vector));
		}
		foreach ($distances as $key=>$vector){
			$min_avg = array();
			$max_avg = array();
			foreach($vector as $k=>$v){
				if($v<=$avg_distance[$key]){
					array_push($min_avg,$v);
				}else{
					array_push($max_avg,$v);
				}
			}
			sort($min_avg);
			sort($max_avg);
			$test_p1 = abs($min_avg[sizeof($min_avg)-1] -$avg_distance[$key]);
			$test_p2 = abs($max_avg[0]-$avg_distance[$key]);
			if($test_p1<$test_p2){
				array_push($centroids,$this->data[array_search($min_avg[sizeof($min_avg)-1],$vector)]);
			}else{
				array_push($centroids,$this->data[array_search($max_avg[0],$vector)]);
			}
		}
		return $centroids;
	}

	public function start_algorithm(){
		$this->init_centroids();
		$map = array();
		$it=0;
		while(true){
			$this->changed = false;
			$new_map = $this->assign_centroids($this->data,$this->centroids);
			foreach ($new_map as $id=>$object){
				if(!isset($map[$id]) || $object!=$map[$id]){
					$map = $new_map;
					$this->changed = true;
					break;
				}
			}
			if(!$this->changed || $it == $this->iterations){
				return $this->prepare_results($map,$this->data);
			}
			$this->centroids = $this->update_centroids($map,$this->k);
			$it++;
		}
	}
	
	private function prepare_results($map,$data){
		$this->result['centroids'] = array();
		$counts = array_count_values($map);
		$this->result['clusters'] = array();
		foreach ($counts as $key=>$val){
			$this->result['centroids'][$key] = $this->centroids[$key];			
		}
		foreach ($map as $id_dat=>$id_centroid){
			$this->result['clusters'][$id_centroid][$id_dat] = $this->data[$id_dat];
		}
		return $this->result;
	}
}