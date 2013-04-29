<?php
class Register_Controller extends View_Controller {

	public function __construct($args) {
		parent::__construct($ids);
		$this->setNameHtml("");
		$this->setIndexHtml('../application/view/index/index.php');
		$this->setMetaHtml('<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">');
		$this->setCssHtml('<link rel="stylesheet" type="text/css" href="css/template.css" media="all"/>');
		$this->setHeader("../application/view/content/header.php");
		$this->setContent("../application/view/content/register.php");
		$this->setFooter("../application/view/content/footer.php");
		$this->setJavascript('');
	}

	public function __destruct() {
		parent::__destruct();
	}
}

?>