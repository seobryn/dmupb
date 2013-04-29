<table>
	<tr valign="top">
		<td>
			<div class="login_left">

				<h3 class="h_no_padding">Formulario de Registro de Usuarios</h3>
				<br /> <img src="img/md.png" alt="Expertos" width="300" /> <br />
				<p>Con una cuenta de Google podrás acceder a todo tu contenido
					(Gmail, fotos y más) desde cualquier dispositivo. Haz búsquedas a
					través de fotos o con la voz. Obtén navegación giro por giro, sube
					tus fotos automáticamente e, incluso, compra artículos con tu
					teléfono a través de Google Wallet.</p>

			</div>
		</td>
		<td>
			<div class="login_right">
				<form name="regist"
					action="index.php?controller=register&method=reg" method="post">
					<ul>
						<li><label>Nombre</label></li>
						<li><input class="login_inp" name="name_inp" type="text"
							required="required" value="" />
						</li>
						<li><label>Apellido</label>
						</li>
						<li><input class="login_inp" name="lastname_inp" type="text"
							required="required" value="" /></li>
						<li><label>Cuenta</label></li>
						<li><input class="login_inp" name="acc_inp" type="text" value=""
							required="required" />
						</li>
						<li><label>Password</label>
						</li>
						<li><input class="login_inp" name="pss_inp" type="password"
							required="required" value="" /></li>
						<li><label>Telefono</label>
						</li>
						<li><input class="login_inp" name="pss_inp" type="tel"
							required="required" value="" /></li>
						<li><label>email</label></li>
						<li><input class="login_inp" name="acc_inp" type="email"
							required="required" value="" />
						</li>
						<li><label>Tipo de Usuario</label>
						</li>
						<li><select class="login_inp">
								<option>Seleccionar...</option>
								<option>Administrador</option>
								<option>Experto</option>
						</select>
						</li>
						<li><input class="btn" onmouseover="this.className='btn_over'"
							onmouseout="this.className='btn'" id="btn_reg" name="sup_inp"
							type="submit" value="Registrarse" /></li>
					</ul>

				</form>
			</div>
		</td>
	</tr>
</table>
