<?php
@session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/template.css"
	media="all" />
<title>DMUPB ERROR!</title>
</head>
<body>
	<div class="header">
		<table>
			<tr>
				<td>
					<div class="logo_header">
						<img src="img/logoC.png" alt="Data mining UPB" width="250" />
					</div>
				</td>
				<td>
					<div class="header_right">
						<div class="usr_log"></div>
						<div class="navbar">
							<table>
								<tr>
									<?php if(empty($_SESSION['account'])){?>
									<td><a href="index.php?controller=login">INGRESAR</a></td>
									<?php }?>
									<td><a href="index.php?controller=home">HOME</a></td>
									<td><a href="index.php?controller=docs">DOCUMENTACIÓN</a></td>
									<?php if(isset($_SESSION['account']) && !empty($_SESSION['account'])){?>
									<td><a href="index.php?controller=login&method=logout">SALIR</a>
									</td>
									<?php }?>
								</tr>
							</table>
						</div>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<div class="content">
		<?php if(isset($_GET['msg']) && !empty($_GET['msg'])){
			switch ($_GET['msg']){
				case 0:?>
		<h3>Su sesi&oacute;n ha expirado</h3>
		<a class="btn" href="index.php?controller=home"
			style="border-radius: 10px; text-decoration: none;">Volver</a>
		<?php 
		break;
				case 1:?>
		<h3>Sesi&oacute;n Invalida</h3>
		<a class="btn" href="index.php?controller=home"
			style="border-radius: 10px; text-decoration: none;">Volver</a>
		<?php
		break;
				case 2:?>
		<h3>El enlace no existe</h3>
		<a class="btn" href="index.php?controller=home"
			style="border-radius: 10px; text-decoration: none;">Volver</a>
		<?php
		break;
				default:?>
		<h3>Error Desconocido</h3>
		<a class="btn" href="index.php?controller=home"
			style="border-radius: 10px; text-decoration: none;">Volver</a>
		<?php break;?>
		<?php }
}?>
	</div>
	<div class="footer" id="login_footer_p">
		<p>
			Powered by <b>Jose Joya Bulla, Christian Fernando Velandia</b> <br />Proyecto
			Integrador I Semestre 2013
		</p>
		<a
			href="http://www.upb.edu.co/portal/page?_pageid=1134,1&_dad=portal&_schema=PORTAL"><img
			src="img/logo upb.png" alt="Universidad Pontificia Bolivariana"
			width="200" /> </a>
	</div>
</body>
</html>
