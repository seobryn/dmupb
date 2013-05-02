<?php
class Login_Controller extends View_Controller {

	public function __construct($args) {
		$ids = array("header"=>'',"content"=>'login_table',"footer"=>'login_footer_p');
		parent::__construct($ids);
		$this->setNameHtml("DMUPB Login");
		$this->setIndexHtml('../application/view/index/index.php');
		$this->setMetaHtml('<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">');
		$this->setCssHtml('<link rel="stylesheet" type="text/css" href="css/template.css" media="all"/><link rel="stylesheet" href="css/jquery-ui.css" />');
		$this->setHeader("../application/view/content/header.php");
		$this->setContent("../application/view/content/login.php");
		$this->setFooter("../application/view/content/footer.php");
		$this->setJavascript('<script src="js/jquery-ui-1.10.2/jquery-1.9.1.js"></script>
				<script src="js/jquery-ui-1.10.2/ui/jquery-ui.js"></script>');
	}

	public function __destruct() {
		parent::__destruct();
	}

	public function login(){
		$type = array(1=>"admin",2=>"expert");
		$db = new MysqlDriver();
		$db->openConnection();
		$sql = "SELECT * FROM user
		WHERE account='".stripcslashes($_POST['acc_inp'])."' AND password='".md5($_POST['pss_inp'])."'";
		$result = $db->getResult($sql);
		if(mysql_num_rows($result) == 1){
			$row = mysql_fetch_array($result);
			$_SESSION['account'] = $row['name'];
			$_SESSION['usr_type'] = $type[$row['id_usrType']];
			$_SESSION['session_time'] = time();
			$db->closeConnection();
			header('Location: index.php?controller=home');
		}else{
			$db->closeConnection();
			header('Location: index.php?controller=login&err=true');
		}
	}

	public function logout(){
		@session_destroy();
		header("Location: index.php?log=true");
	}

}
?>