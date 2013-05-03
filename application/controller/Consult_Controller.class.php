<?php
class Consult_Controller extends View_Controller {

	private $results;

	public function __construct($args) {
		$ids = array("header"=>'',"content"=>'',"footer"=>'login_footer_p');
		parent::__construct($ids);
		$this->setNameHtml("DMUPB Workspace");
		$this->setIndexHtml('../application/view/index/index.php');
		$this->setMetaHtml('<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">');
		$this->setCssHtml('<link rel="stylesheet" type="text/css" href="css/template.css" media="all"/><link rel="stylesheet" type="text/css" href="css/tab.css" media="all" />');
		$this->setHeader("../application/view/content/header.php");
		$this->setContent("../application/view/content/consult.php");
		$this->setFooter("../application/view/content/footer.php");
		$this->setJavascript('<script src="js/jquery.js"></script><script src="js/jquery.min.js"></script><script src="js/jTabs.js"></script><script type="text/javascript">

				$(document).ready(function(){

				$(".slidingDiv").hide();
				$(".show_hide").show();
					
				$(".show_hide").click(function(){
				$(".slidingDiv").slideToggle();


	});

	});

				</script><script>
				$(document).ready(function(){
				$("ul.tabs").jTabs({content: ".tabs_content"});});
				</script><script src="js/gen_predict.js"></script><script src="js/draw_canvas.js"></script>');
		$this->results = array();
	}

	public function __destruct() {
		parent::__destruct();
	}

	public function exec(){
		$temp_file = new FileRead();
		$array_data = $temp_file->read($_FILES['file_inp']['tmp_name'],$_POST['pre_sel']);
		$array_data = Utils::clean_data($array_data);
		$alg = $_POST['alg_inp'];
		$algorithm = new $alg($array_data,40,6);
		$this->results = $algorithm->start_algorithm();
		return $this->deploy();
	}

	public function getResults(){
		return $this->results;
	}

	public function load(){
		$temp_file = new FileRead();
		$array_data = $temp_file->read($_FILES['file_inp']['tmp_name'],"");
		$this->results = $array_data;
		return $this->deploy();
	}
}

?>