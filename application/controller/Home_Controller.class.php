<?php
class Home_Controller extends View_Controller {

	public function __construct($args) {
		parent::__construct($ids);
		$this->setNameHtml("DMUPB Home");
		$this->setIndexHtml('../application/view/index/index.php');
		$this->setMetaHtml('<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">');
		$this->setCssHtml('<link rel="stylesheet" type="text/css" href="css/template.css" media="all"/><link rel="stylesheet" href="css/responsiveslides.css">
				<link rel="stylesheet" href="css/demo.css"><link rel="stylesheet" href="css/jquery-ui.css" />');
		$this->setHeader("../application/view/content/header.php");
		$this->setContent("../application/view/content/home.php");
		$this->setFooter("../application/view/content/footer.php");
		$this->setJavascript('<script
				src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
				<script src="js/responsiveslides.min.js"></script><script
				src="js/slider.js"></script><script src="js/jquery-ui-1.10.2/jquery-1.9.1.js"></script>
				<script src="js/jquery-ui-1.10.2/ui/jquery-ui.js"></script>');
	}

	public function __destruct() {
		parent::__destruct();
	}
}

?>