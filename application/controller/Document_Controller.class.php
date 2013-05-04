<?php
class Document_Controller extends View_Controller {

	public function __construct($args) {
		parent::__construct($ids);
		$this->setNameHtml("DMUPB Documentación");
		$this->setIndexHtml('../application/view/index/index.php');
		$this->setMetaHtml('<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">');
		$this->setCssHtml('<link rel="stylesheet" type="text/css" href="css/template.css" media="all"/><link rel="stylesheet" type="text/css" href="css/tab.css" media="all" />');
		$this->setHeader("../application/view/content/header.php");
		$this->setContent("../application/view/content/documents.php");
		$this->setFooter("../application/view/content/footer.php");
		$this->setJavascript('<script src="js/jquery.js"></script><script src="js/jquery.min.js"></script><script src="js/jTabs.js"></script>

				<script>
				$(document).ready(function(){
				$("ul.tabs").jTabs({content: ".tabs_content"});});
				</script><script src="js/gen_predict.js"></script><script src="js/draw_canvas.js"></script>');
	}

	public function __destruct() {
		parent::__destruct();
	}
}

?>