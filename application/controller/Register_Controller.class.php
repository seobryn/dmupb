<?php
class Register_Controller extends View_Controller {

	private $id_register;

	public function __construct($args) {
		parent::__construct($ids);
		$this->setNameHtml("DMUPB Register");
		$this->setIndexHtml('../application/view/index/index.php');
		$this->setMetaHtml('<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">');
		$this->setCssHtml('<link rel="stylesheet" type="text/css" href="css/template.css" media="all"/><link rel="stylesheet" href="css/jquery-ui.css" />');
		$this->setHeader("../application/view/content/header.php");
		$this->setContent("../application/view/content/register.php");
		$this->setFooter("../application/view/content/footer.php");
		$this->setJavascript('<script src="js/validate.js"></script><script src="js/jquery-ui-1.10.2/jquery-1.9.1.js"></script>
				<script src="js/jquery-ui-1.10.2/ui/jquery-ui.js"></script>');
	}

	public function __destruct() {
		parent::__destruct();
	}

	public function reg(){
		$user_name =strtolower( $_POST['name_inp']);
		$user_last =strtolower($_POST['lastname_inp']);
		$user_account = strtolower($_POST['acc_inp']);
		$user_pass = md5($_POST['pss_inp']);
		$user_tel = $_POST['tel_inp'];
		$user_mail =$_POST['mail_inp'];
		$user_type= $_POST['type_inp'];
		if(is_numeric($user_tel) && filter_var($user_mail,FILTER_VALIDATE_EMAIL)){
			$db = new MysqlDriver();
			$db->openConnection();
			$sql = "INSERT INTO user VALUES (NULL,'".$user_name."','".$user_last."','".$user_account."','".$user_pass."','".$user_tel."','".$user_mail."',".$user_type.")";
			$this->id_register = $db->Insert($sql);
		}else{
			$this->id_register="-1";
		}
		return $this->deploy();
	}

	public function getIdRegister(){
		return $this->id_register;
	}
}

?>