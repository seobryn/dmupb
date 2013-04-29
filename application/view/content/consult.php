<?php if(sizeof($controller->getResults())==0){?>
<table>
	<tr valign="top">
		<td>
			<div class="login_left">

				<h3 class="h_no_padding">Selección del archivo fuente</h3>
				<p>Por favor seleccione el archivo tipo .arff, a continuación click
					en continuar.</p>

			</div>
		</td>
		<td>
			<div class="login_right">
				<form name="query" action="index.php?controller=consult&method=exec"
					method="post" enctype="multipart/form-data">
					<ul>
						<li><label>Archivo</label></li>
						<li><input class="login_inp" name="file_inp" type="file"
							required="required" />
						</li>
						<li><label>Algoritmo</label></li>
						<li><select name="alg_inp" class="login_inp">
								<option value="GKmodes">GK-modes</option>
								<option value="Algorithm">Aislado</option>
						</select>
						</li>
						<li><input class="btn" onmouseover="this.className='btn_over'"
							onmouseout="this.className='btn'" id="btn_cons" name="sup_inp"
							type="submit" value="Generar" /></li>
					</ul>

				</form>
			</div>
		</td>
	</tr>
</table>
<?php }else{
	echo "Se cargaron los datos y se ejecuto el algoritmo: ".$_POST['alg_inp'];
}?>