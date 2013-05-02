<?php
$id = $controller->getIdRegister();
if(isset($id) && !empty($id)){
	if($id>=0){?>
<div id="popup_message" title="AGREGAR USUARIO">
	<p>Usuario Agregado Correctamente</p>
</div>
<?php }else{?>
<div id="popup_message" title="AGREGAR USUARIO">
	<p>El Usuario Ya existe.</p>
</div>
<?php }
}?>
<script>
$(function() {
    $( "#popup_message" ).dialog();
  });
</script>
<table>
	<tr valign="top">
		<td>
			<div class="login_left">

				<h3 class="h_no_padding">Formulario de Registro de Usuarios</h3>
				<br /> <img src="img/md.png" alt="Expertos" width="300" /> <br />
				<p>Por favor, llenar el formulario que se encuentra a continuación.
					Al registrar un nuevo usuario, éste tendrá el derecho a cargar
					archivos de datos en formato arff y realizar su respectivo
					analisis, permitiendo encontrar similaridades a través de cifras y
					graficas de dispersión.</p>

			</div>
		</td>
		<td>
			<div class="login_right">
				<form name="regist"
					action="index.php?controller=register&method=reg" method="post">
					<ul>
						<li><label>Nombre</label>
						</li>
						<li><input class="login_inp" name="name_inp" type="text"
							required="required" value="" /></li>
						<li><label>Apellido</label></li>
						<li><input class="login_inp" name="lastname_inp" type="text"
							required="required" value="" />
						</li>
						<li><label>Cuenta</label>
						</li>
						<li><input class="login_inp" name="acc_inp" type="text" value=""
							required="required" /></li>
						<li><label>Password</label></li>
						<li><input class="login_inp" id="txt_inp" name="pss_inp"
							type="password" required="required" value=""
							onkeyup="validate_pass()" />
						</li>
						<li><label>Re-type Password</label></li>
						<li><input class="login_inp" id="txt_inp2" name="pss_inp2"
							type="password" required="required" value=""
							onkeyup="validate_pass()" />
						</li>
						<li><label>Telefono</label></li>
						<li><input class="login_inp" name="tel_inp" type="tel"
							required="required" value="" />
						</li>
						<li><label>email</label>
						</li>
						<li><input class="login_inp" name="mail_inp" type="email"
							required="required" value="" /></li>
						<li><label>Tipo de Usuario</label></li>
						<li><select class="login_inp" name="type_inp">
								<option>Seleccionar...</option>
								<option value="1">Administrador</option>
								<option value="2">Experto</option>
						</select></li>
						<li><input class="btn" onmouseover="this.className='btn_over'"
							onmouseout="this.className='btn'" id="btn_reg" name="sup_inp"
							type="submit" value="Registrarse" />
						</li>
					</ul>

				</form>
			</div>
		</td>
	</tr>
</table>
