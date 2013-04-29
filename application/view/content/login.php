<?php  if(isset($_GET['err']) && !empty($_GET['err'])){
	@session_destroy();
	?>
<div id="popup_message" title="ERROR">
	<p>Usuario/Contrase&ntilde;a Incorrectos</p>
</div>
<script>
$(function() {
    $( "#popup_message" ).dialog();
  });
</script>
<?php }?>
<table>
	<tr>
		<td>
			<div class="login_left">
				<img src="img/logoB.png" height="100" alt="dataMining UPB" />
				<h3>
					<br /> Universidad Pontificia Bolivariana Seccional Bucaramanga
				</h3>

			</div>
		</td>
		<td>
			<div class="login_right">
				<form name="login" action="index.php?controller=login&method=login"
					method="post">
					<ul>
						<li><label>Usuario </label>
						</li>
						<li><input class="login_inp" name="acc_inp" type="text" value="" />
						</li>
						<li><label>Contrase&ntilde;a </label></li>
						<li><input class="login_inp" name="pss_inp" type="password"
							value="" />
						</li>
						<li><input class="btn" onmouseover="this.className='btn_over'"
							onmouseout="this.className='btn'" id="btn_login" name="sup_inp"
							type="submit" value="Ingresar" />
						</li>
						<li><a class="register" href="index.php?controller=register">Registrarse</a>
						</li>
					</ul>

				</form>
			</div>
		</td>
	</tr>
</table>
