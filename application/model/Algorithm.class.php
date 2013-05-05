<?php
//THIS CLASS IS FOR OWN ALGORITHM
class Algorithm{

	private $data;
	private $iterations;
	private $centroids;
	private $k;
	private $changed;

	public function Algorithm($data_set,$maxit,$k){
		if(!isset($data_set)){
			echo "ERROR: Data set is necessary to run the algorithm.<br/>Please, Try again with all required data.";
			exit();
		}
		if(!isset($maxit) || ($maxit=="") || empty($maxit)){
			$this->iterations = 40;
		}else{
			$this->iterations = $maxit;
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
				$distance = Utils::modified_distance($row,$value);
				if(is_null($min_distance) || $distance < $min_distance){
					$min_distance = $distance;
					$min_centroid = $id;
				}
			}
			$map[$row->getIndex()] = $min_centroid;
		}
		return $map;
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
	private function update_centroids($map,$k){
		$centroids = array();
		$distances = array();
		foreach ($map as $dat=>$centroid){
			$distances[$centroid][$dat] = array_sum(Utils::modified_distance($this->data[$dat],$this->centroids[$centroid]));
		}
		$avg_distance = array();
		foreach ($distances as $key=>$vector){
			$avg_distance[$key] = (array_sum($vector)/sizeof($vector));
		}
		foreach ($distances as $key=>$vector){
			$min_avg = array();
			$max_avg = array();
			foreach($vector as $v){
				if(array_sum($v)<=$avg_distance[$key]){
					array_push($min_avg,floatval(array_sum($v)));
				}else{
					array_push($max_avg,floatval($v));
				}
			}

			/*ACA DEBO CALCULAR EL MAYOR DE LOS MENORES Y EL MENOR DE LOS MAYORES*/
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
		$final = $this->generateIndexes($map);
		$this->result['index_inter'] = $final[0];
		$this->result['indexes'] = $final[1];
		$this->result['size']=$this->get_len();
		return $this->result;
	}

	private function generateIndexes($map){
		$counters = array_count_values($map);
		$indexes = array();
		foreach ($map as $data_id => $centroid_id){
			$indexes[$centroid_id] += array_sum(Utils::modified_distance($this->data[$data_id],$this->centroids[$centroid_id]));
		}
		$x = sizeof($this->data[0]->getParameters());
		foreach($indexes as $centroid_id=>$prom){
			$indexes[$centroid_id] = ($prom/$counters[$centroid_id])/$x;
		}
		$total = array();
		$total[0] = $indexes;//INTRA CLUSTER
		$indexes = array();
		for($i=0;$i<sizeof($this->centroids)-1;$i++){
			for($j=$i+1;$j<sizeof($this->centroids);$j++){
				$indexes[$i][$j] = array_sum(Utils::modified_distance($this->centroids[$i], $this->centroids[$j]))/$x;
			}
		}
		$total[1] = $indexes; //EXTRA CLUSTER
		return $total;
	}

	public function get_len(){
		return sizeof($this->data);

	}
}
?>