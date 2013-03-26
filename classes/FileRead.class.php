<?php
include_once 'Data.class.php';
class FileRead{

	private $data_types;
	
	public function FileRead(){
		$this->data_types = array();
	}

	//this method read a temp file of server and return data set for any arff file
	public function read($file_arff,$predict_data){
		$file=fOpen($file_arff,"r") or exit("Unable to open the file!");
		$data_set = array();
		$param = array();
		while (!feof($file)){
			$line = fgets($file);
			$data = new Data($predict_data);
			if(!(substr($line,0,1)=="%") && (trim($line)!="")){
				if(substr($line,0,1)=="@"){
					if(strtolower(substr($line,0,10))=="@attribute"){
						$attrib = explode(" ",$line);
						$attr = str_replace("'","",$attrib[1]);
						array_push($param,$attr);
						if(substr($attrib[2],0,1)=="{"){
							array_push($this->data_types,"table");
						}else{
							array_push($this->data_types,"real");
						}
					}
				}else{
					$i=0;
					$attributes = explode(",",$line);
					foreach ($param as $value){
						$tmp = str_replace("'","",$attributes[$i]);
						$tmp = str_replace("\"","",$tmp);
						$tmp = trim($tmp);
						$data->setParameter($value,$tmp);
						$i++;
					}
					array_push($data_set,$data);
				}
			}
		}
		fclose();
		unset($file);
		unset($line);
		unset($data);
		unset($param);
		unset($attrib);
		unset($attr);
		unset($attributes);
		unset($i);
		return $data_set;
	}

	public function getDataTypes() {
		return $this->data_types;
	}
}
?>
