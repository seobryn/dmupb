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
							<td><a href="index.php?controller=login">INGRESAR</a>
							</td>
							<?php }?>
							<td><a href="index.php?controller=home">HOME</a>
							</td>
							<?php if (isset($_SESSION['account']) && !empty($_SESSION['account'])){?>
							<td><a href="index.php?controller=consult">CONSULTA</a>
							</td>
							<?php }?>
							<?php if($_SESSION['usr_type']=='admin'){?>
							<td><a href="index.php?controller=register">REGISTRO</a> <?php }?>
							</td>
							<td><a href="index.php?controller=document">DOCUMENTACIÓN</a>
							</td>
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
