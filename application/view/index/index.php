
<?php if (isset($controller) and !empty($controller)) {?>
<!DOCTYPE HTML >
<html>
<head>


<?php echo $controller->getMetaHtml()?>
<?php echo $controller->getCssHtml()?>
<?php echo $controller->getJavascript()?>
<title><?php echo $controller->getNameHtml()?></title>
</head>
<body>
	<div class="header" id="<?php echo $controller->getId()['header']?>">
		<?php require_once $controller->getHeader();?>
	</div>
	<div class="content" id="<?php echo $controller->getId()['content']?>">
		<?php require_once $controller->getContent();?>
	</div>
	</div>
	<div class="footer" id="<?php echo $controller->getId()['footer']?>">
		<?php require_once $controller->getFooter();?>

</body>
</html>

<?php }?>