<?php
class Consult_Controller extends View_Controller {

	private $results;

	public function __construct($args) {
		$ids = array("header"=>'',"content"=>'',"footer"=>'login_footer_p');
		parent::__construct($ids);
		$this->setNameHtml("");
		$this->setIndexHtml('../application/view/index/index.php');
		$this->setMetaHtml('<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">');
		$this->setCssHtml('<link rel="stylesheet" type="text/css" href="css/template.css" media="all"/>');
		$this->setHeader("../application/view/content/header.php");
		$this->setContent("../application/view/content/consult.php");
		$this->setFooter("../application/view/content/footer.php");
		$this->setJavascript('');
		$this->results = array();
	}

	public function __destruct() {
		parent::__destruct();
	}

	public function exec(){
		$temp_file = new FileRead();
		$array_data = $temp_file->read($_FILES['file_inp']['tmp_name'],"num");
		$array_data = Utils::clean_data($array_data);
		$alg = $_POST['alg_inp'];
		$algorithm = new $alg($array_data,40,4);
		$this->results = $algorithm->start_algorithm();
		return $this->deploy();
	}

	public function getResults(){
		return $this->results;
	}
}

?>