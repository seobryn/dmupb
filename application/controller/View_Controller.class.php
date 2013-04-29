<?php
abstract class View_Controller {

	//HTML
	private $_NameHtml;
	private $_IndexHtml; //relacion con la vista
	private $_MetaHtml;
	private $_CssHtml;
	private $_Header;
	private $_Content;
	private $_Footer;
	private $_Javascript;
	private $_id;

	//Entorno.
	private $_Session;
	private $_DataBase;
	private $_Message;
	private $_Config;

	public function setJavascript($_Javascript){
		$this->Javascript = $_Javascript;
	}

	public function getJavascript(){
		return $this->Javascript;
	}

	public function getHeader() {
		return $this->_Header;
	}

	public function setHeader($_Header) {
		$this->_Header = $_Header;
	}

	public function getContent() {
		return $this->_Content;
	}

	public function setContent($_Content) {
		$this->_Content = $_Content;
	}

	public function getFooter() {
		return $this->_Footer;
	}

	public function setFooter($_Footer) {
		$this->_Footer = $_Footer;
	}

	public function getCssHtml() {
		return $this->_CssHtml;
	}

	public function setCssHtml($_CssHtml) {
		$this->_CssHtml = $_CssHtml;
	}

	public function getMetaHtml() {
		return $this->_MetaHtml;
	}

	public function setMetaHtml($_MetaHtml) {
		$this->_MetaHtml = $_MetaHtml;
	}

	public function getIndexHtml() {
		return $this->_IndexHtml;
	}

	public function setIndexHtml($_IndexHtml) {
		$this->_IndexHtml = $_IndexHtml;
	}

	public function getNameHtml() {
		return $this->_NameHtml;
	}

	public function setNameHtml($_NameHtml) {
		$this->_NameHtml = $_NameHtml;
	}

	//abstract protected function init();

	public function __construct($args) {
		$this->_id = $args;
	}

	public function __destruct() {
		;
	}

	public function deploy() {
		return $this->_IndexHtml;
	}

	public function getId() {
		return $this->_id;
	}

}
?>