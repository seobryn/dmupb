<?php if(!empty($_SESSION['account']) && isset($_SESSION['account'])){?>
<?php if(sizeof($controller->getResults())==0){?>
<table>
	<tr valign="top">
		<td>
			<div class="login_left">

				<h3 class="h_no_padding">Selección del archivo fuente</h3>
				<p>Por favor seleccione el archivo tipo .arff, Para cargar las
					opciones del campo predictor</p>

			</div>
		</td>
		<td>
			<div class="login_right">
				<form name="query" action="index.php?controller=consult&method=load"
					method="post" enctype="multipart/form-data">
					<ul>
						<li><label>Archivo</label></li>
						<li><input id="file_path" class="login_inp" name="file_inp"
							type="file" required="required" />
						</li>
						<li><input class="btn" onmouseover="this.className='btn_over'"
							onmouseout="this.className='btn'" id="btn_cons" name="sup_inp"
							type="submit" value="Cargar" /></li>
					</ul>

				</form>
			</div>
		</td>
	</tr>
</table>
<?php }else{
	$results;
	if(isset($_POST['pre_sel']) && !empty($_POST['pre_sel'])){
		$algorithms= array("GKmodes"=>"GK-MODES","Algorithm"=>"Aislado");
		$results = $controller->getResults();
		$centroids = $results['centroids'];
		$clusters = $results['clusters'];
		$index_inter = $results['index_inter'];
		$indexes = $results['indexes'];
		$parameters = $centroids[0]->getParameters();
	}else{
		$results = $controller->getResults();
		$parameters = $results[0]->getParameters();
	}
	?>
<table>
	<tr valign="top">
		<td>
			<div class="login_left">

				<h3 class="h_no_padding">Selección del archivo fuente</h3>
				<p>Por favor seleccione el archivo tipo .arff, opcionalmente agregue
					el nombre de un campo que desee utilizar como predictor, a
					continuación clic en continuar.
			
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
						<li><label>Campo predictor</label></li>
						<li><select name="pre_sel" class="login_inp">
								<option>Seleccionar...</option>
								<?php foreach ($parameters as $p){ ?>
								<option value="<?php echo $p; ?>">
									<?php echo $p; ?>
								</option>
								<?php } ?>
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
<?php if(isset($_POST['pre_sel']) && !empty($_POST['pre_sel'])){ ?>
<div class="main_content">
	<h2 class="openClose_title">
		<a href="#" class="show_hide">Mostrar&nbsp;Resultados<img
			class="img_plus" src="img/plus.png" width="32" />
		</a>
	</h2>
</div>
<div class="slidingDiv">
	<div class="tabs_container">
		<ul class="tabs">
			<li class="active"><a href="#">Gr&aacute;fica</a></li>
			<li class="active"><a href="#">Centroide&nbsp;1</a></li>
			<li class="active"><a href="#">Centroide&nbsp;2</a></li>
			<li class="active"><a href="#">Centroide&nbsp;3</a></li>
			<li class="active"><a href="#">Centroide&nbsp;4</a></li>
			<li class="active"><a href="#">Centroide&nbsp;5</a></li>
			<li class="active"><a href="#">Centroide&nbsp;6</a></li>
		</ul>
	</div>
	<div class="clear"></div>
	<div class="tabs_content">
		<div>
			<!--  TAB 1 -->
			<div class="main_content">
				<h2>
					Algoritmo
					<?php echo $algorithms[$_POST['alg_inp']];?>
				</h2>
				<h3>Gr&aacute;fica</h3>

				<table class="canvas_tbl">
					<tr>
						<td>
							<canvas id="cent1"></canvas>
						</td>
						<td>
							<canvas id="cent2"></canvas>
						</td>
						<td>
							<canvas id="cent3"></canvas>
						</td>
					</tr>
					<tr>
						<td>
							<canvas id="cent4"></canvas>
						</td>
						<td>
							<canvas id="cent5"></canvas>
						</td>
						<td>
							<canvas id="cent6"></canvas>
						</td>
					</tr>
				</table>
			</div>
			<script type="text/javascript">
		<!-- INICIO PINTAR CANVAS -->
		paint("cent1",0,0,"#03C8DE",4,1);
		<?php foreach($clusters[0] as $register){ ?>
		paint("cent1",<?php echo rand(-70,70); ?>,<?php echo rand(-70,70); ?>,"#91F4FF",2,0);
		<?php }?>
		paint("cent2",0,0,"red",4,1);
		<?php foreach($clusters[1] as $register){ ?>
		paint("cent2",<?php echo rand(-70,70); ?>,<?php echo rand(-70,70); ?>,"red ",2,0);
		<?php }?>
		paint("cent3",0,0,"white",4,1);
		<?php foreach($clusters[2] as $register){ ?>
		paint("cent3",<?php echo rand(-70,70); ?>,<?php echo rand(-70,70); ?>,"white",2,0);
		<?php }?>
		paint("cent4",0,0,"green",4,1);
		<?php foreach($clusters[3] as $register){ ?>
		paint("cent4",<?php echo rand(-70,70); ?>,<?php echo rand(-70,70); ?>,"green",2,0);
		<?php }?>
		paint("cent5",0,0,"aqua",4,1);
		<?php foreach($clusters[4] as $register){ ?>
		paint("cent5",<?php echo rand(-70,70); ?>,<?php echo rand(-70,70); ?>,"aqua",2,0);
		<?php }?>
		paint("cent6",0,0,"blue",4,1);
		<?php foreach($clusters[5] as $register){ ?>
		paint("cent6",<?php echo rand(-70,70); ?>,<?php echo rand(-70,70); ?>,"blue",2,0);
		<?php }?>
		
		<!-- FIN PINTAR CANVAS -->
		</script>
		</div>
		<!-- END TAB 1 -->
		<div>
			<!-- START TAB 2 -->
			<div class="centroid_container">
				<!-- START Lista de informacion del centroid -->
				<table>
					<tbody>
						<tr>
							<td><div class="centroid_info">
									<H4>Información del Centriode 1</H4>
									<!-- Numero del centroid -->
									<table>
										<tr valign="top">
											<td>
												<div class="ul_centroid">
													<!-- Informacion del centroid -->
													<ul>
														<?php
													foreach ($parameters as $parameter){?>
														<li><b><?php echo strtoupper($parameter);?>:</b>&nbsp;<?php echo $centroids[0]->getParameter($parameter);
														if($parameter=="restecg"){
															break;
														} ?></li>
														<?php }
														$centinel=false;
														?>
													</ul>
												</div>
											</td>
											<td>
												<div class="ul_centroid">
													<!-- Informacion del centroid -->
													<ul>
														<?php
														foreach ($parameters as $parameter){
														if ($centinel==true){?>
														<li><b><?php echo strtoupper($parameter);?>:</b>&nbsp;<?php echo $centroids[0]->getParameter($parameter);
														?>
														</li>
														<?php }else{
															if($parameter=="restecg"){
																$centinel=true;
															}
														}
}?>
													</ul>
												</div>
											</td>
										</tr>
									</table>
								</div></td>
							<td><div class="centroid_info1">
									<H4>Distrancia Intra/Extra-cluster</H4>
									<table>
										<tr valign="top">
											<td>
												<div class="ul_centroid">
													<ul>
														<!-- Informacion del centroid -->
														<li><b>[1] RESPECTO A [2] = </b>&nbsp;&nbsp;<?php echo round($indexes[0][1],2);?><br />
														</li>
														<li><b>[1] RESPECTO A [3] = </b>&nbsp;&nbsp;<?php echo round($indexes[0][2],2);?><br />
														</li>
														<li><b>[1] RESPECTO A [4] = </b>&nbsp;&nbsp;<?php echo round($indexes[0][3],2);?><br />
														</li>
														<li><b>[1] RESPECTO A [5] = </b>&nbsp;&nbsp;<?php echo round($indexes[0][4],2);?><br />
														</li>
														<li><b>[1] RESPECTO A [6] = </b>&nbsp;&nbsp;<?php echo round($indexes[0][5],2);?><br />
														</li>
													</ul>
												</div>
											</td>
											<td>
												<div class="ul_centroid">
													<ul>

														<li><b>INTRA CLUSTER = </b>&nbsp;&nbsp;<?php echo round($index_inter[0],2);?>
														</li>
													</ul>
												</div>
											</td>
										</tr>
									</table>
								</div></td>
						</tr>
					</tbody>

					<!-- FINISH Lista de informacion del centroid -->
				</table>

			</div>

			<div class="main_table" id="title_table">
				<!-- Encabezado de la tabla, no tocar -->
				<table>
					<tr class="tr_title">
						<?php foreach ($parameters as $parameter){
							if($parameter=="fbs"){
								?>
						<th><div class="table_100">
								<?php echo strtoupper($parameter); ?>
							</div></th>
						<?php
							}else{
								?>
						<th><div class="table_50">
								<?php echo strtoupper($parameter); ?>
							</div></th>
						<?php }
} ?>
					</tr>
				</table>
			</div>
			<div class="main_table">
				<div class="main_table">
					<!-- Datos del cluster -->
					<?php $count = 0;?>
					<table>
						<?php
						foreach ($clusters[0] as $register){
							if($count==0){
								echo '<tr class="tr_one">';
								foreach ($parameters as $parameter){
									?>
						<td class="table_50"><?php echo $register->getParameter($parameter);?>
						</td>
						<?php } echo '</tr>'; $count=1;
							}else{
								echo '<tr>';
								foreach ($parameters as $parameter){
									?>
						<td><?php echo $register->getParameter($parameter);?>
						</td>
						<?php }echo'</tr>';$count=0; 
							}
						}?>
					</table>
				</div>
				<!-- END  main_table -->
			</div>

		</div>
		<!-- END TAB 2 -->
		<div>
			<!-- START TAB 3 -->
			<div class="centroid_container">
				<!-- START Lista de informacion del centroid -->
				<table>
					<tbody>
						<tr>
							<td><div class="centroid_info">
									<H4>Información del Centriode 2</H4>
									<!-- Numero del centroid -->
									<table>
										<tr valign="top">
											<td>
												<div class="ul_centroid">
													<!-- Informacion del centroid -->
													<ul>
														<?php
													foreach ($parameters as $parameter){?>
														<li><b><?php echo strtoupper($parameter);?>:</b>&nbsp;<?php echo $centroids[1]->getParameter($parameter);
														if($parameter=="restecg"){
															break;
														} ?></li>
														<?php }
														$centinel=false;
														?>
													</ul>
												</div>
											</td>
											<td>
												<div class="ul_centroid">
													<!-- Informacion del centroid -->
													<ul>
														<?php
														foreach ($parameters as $parameter){
														if ($centinel==true){?>
														<li><b><?php echo strtoupper($parameter);?>:</b>&nbsp;<?php echo $centroids[1]->getParameter($parameter);
														?>
														</li>
														<?php }else{
															if($parameter=="restecg"){
																$centinel=true;
															}
														}
}?>
													</ul>
												</div>
											</td>
										</tr>
									</table>
								</div></td>
							<td><div class="centroid_info1">
									<H4>Distrancia Intra/Extra-cluster</H4>
									<table>
										<tr valign="top">
											<td>
												<div class="ul_centroid">
													<ul>
														<!-- Informacion del centroid -->
														<li><b>[2] RESPECTO A [1] = </b>&nbsp;&nbsp;<?php echo round($indexes[0][1],2);?><br />
														</li>
														<li><b>[2] RESPECTO A [3] = </b>&nbsp;&nbsp;<?php echo round($indexes[1][2],2);?><br />
														</li>
														<li><b>[2] RESPECTO A [4] = </b>&nbsp;&nbsp;<?php echo round($indexes[1][3],2);?><br />
														</li>
														<li><b>[2] RESPECTO A [5] = </b>&nbsp;&nbsp;<?php echo round($indexes[1][4],2);?><br />
														</li>
														<li><b>[2] RESPECTO A [6] = </b>&nbsp;&nbsp;<?php echo round($indexes[1][5],2);?><br />
														</li>
													</ul>
												</div>
											</td>
											<td>
												<div class="ul_centroid">
													<ul>

														<li><b>INTRA CLUSTER = </b>&nbsp;&nbsp;<?php echo round($index_inter[1],2);?>
														</li>
													</ul>
												</div>
											</td>
										</tr>
									</table>
								</div></td>
						</tr>
					</tbody>

					<!-- FINISH Lista de informacion del centroid -->
				</table>

			</div>

			<div class="main_table" id="title_table">
				<!-- Encabezado de la tabla, no tocar -->
				<table>
					<tr class="tr_title">
						<?php foreach ($parameters as $parameter){
							if($parameter=="fbs"){
								?>
						<th><div class="table_100">
								<?php echo strtoupper($parameter); ?>
							</div></th>
						<?php
							}else{
								?>
						<th><div class="table_50">
								<?php echo strtoupper($parameter); ?>
							</div></th>
						<?php }
} ?>
					</tr>
				</table>
			</div>
			<div class="main_table">
				<div class="main_table">
					<!-- Datos del cluster -->
					<?php $count = 0;?>
					<table>
						<?php
						foreach ($clusters[1] as $register){
							if($count==0){
								echo '<tr class="tr_one">';
								foreach ($parameters as $parameter){
									?>
						<td class="table_50"><?php echo $register->getParameter($parameter);?>
						</td>
						<?php } echo '</tr>'; $count=1;
							}else{
								echo '<tr>';
								foreach ($parameters as $parameter){
									?>
						<td><?php echo $register->getParameter($parameter);?>
						</td>
						<?php }echo'</tr>';$count=0; 
							}
						}?>
					</table>
				</div>
				<!-- END  main_table -->
			</div>

		</div>
		<!-- END TAB 3 -->
		<!-- START TAB 4 -->
		<div>
			<div class="centroid_container">
				<!-- START Lista de informacion del centroid -->
				<table>
					<tbody>
						<tr>
							<td><div class="centroid_info">
									<H4>Información del Centriode 3</H4>
									<!-- Numero del centroid -->
									<table>
										<tr valign="top">
											<td>
												<div class="ul_centroid">
													<!-- Informacion del centroid -->
													<ul>
														<?php
													foreach ($parameters as $parameter){?>
														<li><b><?php echo strtoupper($parameter);?>:</b>&nbsp;<?php echo $centroids[2]->getParameter($parameter);
														if($parameter=="restecg"){
															break;
														} ?></li>
														<?php }
														$centinel=false;
														?>
													</ul>
												</div>
											</td>
											<td>
												<div class="ul_centroid">
													<!-- Informacion del centroid -->
													<ul>
														<?php
														foreach ($parameters as $parameter){
														if ($centinel==true){?>
														<li><b><?php echo strtoupper($parameter);?>:</b>&nbsp;<?php echo $centroids[2]->getParameter($parameter);
														?>
														</li>
														<?php }else{
															if($parameter=="restecg"){
																$centinel=true;
															}
														}
}?>
													</ul>
												</div>
											</td>
										</tr>
									</table>
								</div></td>
							<td><div class="centroid_info1">
									<H4>Distrancia Intra/Extra-cluster</H4>
									<table>
										<tr valign="top">
											<td>
												<div class="ul_centroid">
													<ul>
														<!-- Informacion del centroid -->
														<li><b>[3] RESPECTO A [1] = </b>&nbsp;&nbsp;<?php echo round($indexes[0][2],2);?><br />
														</li>
														<li><b>[3] RESPECTO A [2] = </b>&nbsp;&nbsp;<?php echo round($indexes[1][2],2);?><br />
														</li>
														<li><b>[3] RESPECTO A [4] = </b>&nbsp;&nbsp;<?php echo round($indexes[2][3],2);?><br />
														</li>
														<li><b>[3] RESPECTO A [5] = </b>&nbsp;&nbsp;<?php echo round($indexes[2][4],2);?><br />
														</li>
														<li><b>[3] RESPECTO A [6] = </b>&nbsp;&nbsp;<?php echo round($indexes[2][5],2);?><br />
														</li>
													</ul>
												</div>
											</td>
											<td>
												<div class="ul_centroid">
													<ul>

														<li><b>INTRA CLUSTER = </b>&nbsp;&nbsp;<?php echo round($index_inter[2],2);?>
														</li>
													</ul>
												</div>
											</td>
										</tr>
									</table>
								</div></td>
						</tr>
					</tbody>

					<!-- FINISH Lista de informacion del centroid -->
				</table>

			</div>

			<div class="main_table" id="title_table">
				<!-- Encabezado de la tabla, no tocar -->
				<table>
					<tr class="tr_title">
						<?php foreach ($parameters as $parameter){
							if($parameter=="fbs"){
								?>
						<th><div class="table_100">
								<?php echo strtoupper($parameter); ?>
							</div></th>
						<?php
							}else{
								?>
						<th><div class="table_50">
								<?php echo strtoupper($parameter); ?>
							</div></th>
						<?php }
} ?>
					</tr>
				</table>
			</div>
			<div class="main_table">
				<div class="main_table">
					<!-- Datos del cluster -->
					<?php $count = 0;?>
					<table>
						<?php
						foreach ($clusters[2] as $register){
							if($count==0){
								echo '<tr class="tr_one">';
								foreach ($parameters as $parameter){
									?>
						<td class="table_50"><?php echo $register->getParameter($parameter);?>
						</td>
						<?php } echo '</tr>'; $count=1;
							}else{
								echo '<tr>';
								foreach ($parameters as $parameter){
									?>
						<td><?php echo $register->getParameter($parameter);?>
						</td>
						<?php }echo'</tr>';$count=0; 
							}
						}?>
					</table>
				</div>
				<!-- END  main_table -->
			</div>

		</div>
		<!-- END TAB 4 -->
		<!-- START TAB 5 -->
		<div>
			<div class="centroid_container">
				<!-- START Lista de informacion del centroid -->
				<table>
					<tbody>
						<tr>
							<td><div class="centroid_info">
									<H4>Información del Centriode 4</H4>
									<!-- Numero del centroid -->
									<table>
										<tr valign="top">
											<td>
												<div class="ul_centroid">
													<!-- Informacion del centroid -->
													<ul>
														<?php
													foreach ($parameters as $parameter){?>
														<li><b><?php echo strtoupper($parameter);?>:</b>&nbsp;<?php echo $centroids[3]->getParameter($parameter);
														if($parameter=="restecg"){
															break;
														} ?></li>
														<?php }
														$centinel=false;
														?>
													</ul>
												</div>
											</td>
											<td>
												<div class="ul_centroid">
													<!-- Informacion del centroid -->
													<ul>
														<?php
														foreach ($parameters as $parameter){
														if ($centinel==true){?>
														<li><b><?php echo strtoupper($parameter);?>:</b>&nbsp;<?php echo $centroids[3]->getParameter($parameter);
														?>
														</li>
														<?php }else{
															if($parameter=="restecg"){
																$centinel=true;
															}
														}
}?>
													</ul>
												</div>
											</td>
										</tr>
									</table>
								</div></td>
							<td><div class="centroid_info1">
									<H4>Distrancia Intra/Extra-cluster</H4>
									<table>
										<tr valign="top">
											<td>
												<div class="ul_centroid">
													<ul>
														<!-- Informacion del centroid -->
														<li><b>[4] RESPECTO A [1] = </b>&nbsp;&nbsp;<?php echo round($indexes[0][3],2);?><br />
														</li>
														<li><b>[4] RESPECTO A [2] = </b>&nbsp;&nbsp;<?php echo round($indexes[1][3],2);?><br />
														</li>
														<li><b>[4] RESPECTO A [3] = </b>&nbsp;&nbsp;<?php echo round($indexes[2][3],2);?><br />
														</li>
														<li><b>[4] RESPECTO A [5] = </b>&nbsp;&nbsp;<?php echo round($indexes[3][4],2);?><br />
														</li>
														<li><b>[4] RESPECTO A [6] = </b>&nbsp;&nbsp;<?php echo round($indexes[3][5],2);?><br />
														</li>
													</ul>
												</div>
											</td>
											<td>
												<div class="ul_centroid">
													<ul>

														<li><b>INTRA CLUSTER = </b>&nbsp;&nbsp;<?php echo round($index_inter[3],2);?>
														</li>
													</ul>
												</div>
											</td>
										</tr>
									</table>
								</div></td>
						</tr>
					</tbody>

					<!-- FINISH Lista de informacion del centroid -->
				</table>

			</div>

			<div class="main_table" id="title_table">
				<!-- Encabezado de la tabla, no tocar -->
				<table>
					<tr class="tr_title">
						<?php foreach ($parameters as $parameter){
							if($parameter=="fbs"){
								?>
						<th><div class="table_100">
								<?php echo strtoupper($parameter); ?>
							</div></th>
						<?php
							}else{
								?>
						<th><div class="table_50">
								<?php echo strtoupper($parameter); ?>
							</div></th>
						<?php }
} ?>
					</tr>
				</table>
			</div>
			<div class="main_table">
				<div class="main_table">
					<!-- Datos del cluster -->
					<?php $count = 0;?>
					<table>
						<?php
						foreach ($clusters[3] as $register){
							if($count==0){
								echo '<tr class="tr_one">';
								foreach ($parameters as $parameter){
									?>
						<td class="table_50"><?php echo $register->getParameter($parameter);?>
						</td>
						<?php } echo '</tr>'; $count=1;
							}else{
								echo '<tr>';
								foreach ($parameters as $parameter){
									?>
						<td><?php echo $register->getParameter($parameter);?>
						</td>
						<?php }echo'</tr>';$count=0; 
							}
						}?>
					</table>
				</div>
				<!-- END  main_table -->
			</div>

		</div>
		<!-- END TAB 5 -->
		<!-- START TAB 6 -->
		<div>
			<div class="centroid_container">
				<!-- START Lista de informacion del centroid -->
				<table>
					<tbody>
						<tr>
							<td><div class="centroid_info">
									<H4>Información del Centriode 5</H4>
									<!-- Numero del centroid -->
									<table>
										<tr valign="top">
											<td>
												<div class="ul_centroid">
													<!-- Informacion del centroid -->
													<ul>
														<?php
													foreach ($parameters as $parameter){?>
														<li><b><?php echo strtoupper($parameter);?>:</b>&nbsp;<?php echo $centroids[4]->getParameter($parameter);
														if($parameter=="restecg"){
															break;
														} ?></li>
														<?php }
														$centinel=false;
														?>
													</ul>
												</div>
											</td>
											<td>
												<div class="ul_centroid">
													<!-- Informacion del centroid -->
													<ul>
														<?php
														foreach ($parameters as $parameter){
														if ($centinel==true){?>
														<li><b><?php echo strtoupper($parameter);?>:</b>&nbsp;<?php echo $centroids[4]->getParameter($parameter);
														?>
														</li>
														<?php }else{
															if($parameter=="restecg"){
																$centinel=true;
															}
														}
}?>
													</ul>
												</div>
											</td>
										</tr>
									</table>
								</div></td>
							<td><div class="centroid_info1">
									<H4>Distrancia Intra/Extra-cluster</H4>
									<table>
										<tr valign="top">
											<td>
												<div class="ul_centroid">
													<ul>
														<!-- Informacion del centroid -->
														<li><b>[5] RESPECTO A [1] = </b>&nbsp;&nbsp;<?php echo round($indexes[0][4],2);?><br />
														</li>
														<li><b>[5] RESPECTO A [2] = </b>&nbsp;&nbsp;<?php echo round($indexes[1][4],2);?><br />
														</li>
														<li><b>[5] RESPECTO A [3] = </b>&nbsp;&nbsp;<?php echo round($indexes[2][4],2);?><br />
														</li>
														<li><b>[5] RESPECTO A [4] = </b>&nbsp;&nbsp;<?php echo round($indexes[3][4],2);?><br />
														</li>
														<li><b>[5] RESPECTO A [6] = </b>&nbsp;&nbsp;<?php echo round($indexes[4][5],2);?><br />
														</li>
													</ul>
												</div>
											</td>
											<td>
												<div class="ul_centroid">
													<ul>

														<li><b>INTRA CLUSTER = </b>&nbsp;&nbsp;<?php echo round($index_inter[0],2);?>
														</li>
													</ul>
												</div>
											</td>
										</tr>
									</table>
								</div></td>
						</tr>
					</tbody>

					<!-- FINISH Lista de informacion del centroid -->
				</table>

			</div>

			<div class="main_table" id="title_table">
				<!-- Encabezado de la tabla, no tocar -->
				<table>
					<tr class="tr_title">
						<?php foreach ($parameters as $parameter){
							if($parameter=="fbs"){
								?>
						<th><div class="table_100">
								<?php echo strtoupper($parameter); ?>
							</div></th>
						<?php
							}else{
								?>
						<th><div class="table_50">
								<?php echo strtoupper($parameter); ?>
							</div></th>
						<?php }
} ?>
					</tr>
				</table>
			</div>
			<div class="main_table">
				<div class="main_table">
					<!-- Datos del cluster -->
					<?php $count = 0;?>
					<table>
						<?php
						foreach ($clusters[4] as $register){
							if($count==0){
								echo '<tr class="tr_one">';
								foreach ($parameters as $parameter){
									?>
						<td class="table_50"><?php echo $register->getParameter($parameter);?>
						</td>
						<?php } echo '</tr>'; $count=1;
							}else{
								echo '<tr>';
								foreach ($parameters as $parameter){
									?>
						<td><?php echo $register->getParameter($parameter);?>
						</td>
						<?php }echo'</tr>';$count=0; 
							}
						}?>
					</table>
				</div>
				<!-- END  main_table -->
			</div>

		</div>
		<!-- END TAB 6 -->
		<!-- START TAB 7 -->
		<div>
			<div class="centroid_container">
				<!-- START Lista de informacion del centroid -->
				<table>
					<tbody>
						<tr>
							<td><div class="centroid_info">
									<H4>Información del Centriode 6</H4>
									<!-- Numero del centroid -->
									<table>
										<tr valign="top">
											<td>
												<div class="ul_centroid">
													<!-- Informacion del centroid -->
													<ul>
														<?php
													foreach ($parameters as $parameter){?>
														<li><b><?php echo strtoupper($parameter);?>:</b>&nbsp;<?php echo $centroids[5]->getParameter($parameter);
														if($parameter=="restecg"){
															break;
														} ?></li>
														<?php }
														$centinel=false;
														?>
													</ul>
												</div>
											</td>
											<td>
												<div class="ul_centroid">
													<!-- Informacion del centroid -->
													<ul>
														<?php
														foreach ($parameters as $parameter){
														if ($centinel==true){?>
														<li><b><?php echo strtoupper($parameter);?>:</b>&nbsp;<?php echo $centroids[5]->getParameter($parameter);
														?>
														</li>
														<?php }else{
															if($parameter=="restecg"){
																$centinel=true;
															}
														}
}?>
													</ul>
												</div>
											</td>
										</tr>
									</table>
								</div></td>
							<td><div class="centroid_info1">
									<H4>Distrancia Intra/Extra-cluster</H4>
									<table>
										<tr valign="top">
											<td>
												<div class="ul_centroid">
													<ul>
														<!-- Informacion del centroid -->
														<li><b>[5] RESPECTO A [1] = </b>&nbsp;&nbsp;<?php echo round($indexes[0][5],2);?><br />
														</li>
														<li><b>[5] RESPECTO A [2] = </b>&nbsp;&nbsp;<?php echo round($indexes[1][5],2);?><br />
														</li>
														<li><b>[5] RESPECTO A [3] = </b>&nbsp;&nbsp;<?php echo round($indexes[2][5],2);?><br />
														</li>
														<li><b>[5] RESPECTO A [4] = </b>&nbsp;&nbsp;<?php echo round($indexes[3][5],2);?><br />
														</li>
														<li><b>[5] RESPECTO A [6] = </b>&nbsp;&nbsp;<?php echo round($indexes[4][5],2);?><br />
														</li>
													</ul>
												</div>
											</td>
											<td>
												<div class="ul_centroid">
													<ul>

														<li><b>INTRA CLUSTER = </b>&nbsp;&nbsp;<?php echo round($index_inter[5],2);?>
														</li>
													</ul>
												</div>
											</td>
										</tr>
									</table>
								</div></td>
						</tr>
					</tbody>

					<!-- FINISH Lista de informacion del centroid -->
				</table>

			</div>

			<div class="main_table" id="title_table">
				<!-- Encabezado de la tabla, no tocar -->
				<table>
					<tr class="tr_title">
						<?php foreach ($parameters as $parameter){
							if($parameter=="fbs"){
								?>
						<th><div class="table_100">
								<?php echo strtoupper($parameter); ?>
							</div></th>
						<?php
							}else{
								?>
						<th><div class="table_50">
								<?php echo strtoupper($parameter); ?>
							</div></th>
						<?php }
} ?>
					</tr>
				</table>
			</div>
			<div class="main_table">
				<div class="main_table">
					<!-- Datos del cluster -->
					<?php $count = 0;?>
					<table>
						<?php
						foreach ($clusters[5] as $register){
							if($count==0){
								echo '<tr class="tr_one">';
								foreach ($parameters as $parameter){
									?>
						<td class="table_50"><?php echo $register->getParameter($parameter);?>
						</td>
						<?php } echo '</tr>'; $count=1;
							}else{
								echo '<tr>';
								foreach ($parameters as $parameter){
									?>
						<td><?php echo $register->getParameter($parameter);?>
						</td>
						<?php }echo'</tr>';$count=0; 
							}
						}?>
					</table>
				</div>
				<!-- END  main_table -->
			</div>

		</div>
		<!-- END TAB 7 -->
	</div>
	<!-- END TAB_CONTENTS 2 -->
</div>
<!-- END slidingDiv-->
<?php }
}?>
<?php }else{
	header("Location: index.php?home");
}?>