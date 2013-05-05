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
		$col=round($_POST['cent_sel']/3,0);
		$size = $results['size'];
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
						<li><label>Centroides</label></li>
						<li><select name="cent_sel" class="login_inp">
								<option>Seleccionar...</option>
								<?php for($i=2;$i<=9;$i++){ ?>
								<option value="<?php echo $i; ?>">
									<?php echo $i; ?>
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
			<li class="active"><a href="#">Gráfica</a></li>
			<?php for($i=0;$i< sizeof($centroids);$i++){
				?>
			<li class="active"><a href="#">Centroide&nbsp;<?php echo ($i+1); ?>
			</a></li>
			<?php 
			}
			?>
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
				<h3 class="indexes">
					Indice General Entre Clusters:
					<?php echo Utils::prom($index_inter);?>
				</h3>
				<table class="canvas_tbl">
					<?php
					$cont=1;
					for($i=0;$i<$col;$i++){

						?>
					<tr>
						<?php
						$x =  round((sizeof($centroids)/$col),0);
						for($j=0;$j<$x;$j++){
							if($cont<=sizeof($centroids)){
								$scluster = count($clusters[($cont-1)]);
								?>
						<td><canvas
								title='header=[<?php echo "Centroide #".$cont.": ( ".$scluster." / ".$size.") => ".round(($scluster/$size)*100)."%"; ?>] body=[<?php echo $centroids[($cont-1)]->toString(); ?>]'
								id='<?php echo "cent".($cont);?>'></canvas></td>
						<?php
						$cont++;
							}
					}?>
					</tr>
					<?php }
					?>
				</table>
			</div>
			<!-- INICIO PINTAR CANVAS -->
			<script>
		<?php 
		$colors = array(0=>"blue",1=>"green",2=>"red",3=>"yellow",4=>"orange",5=>"aqua",6=>"purple",7=>"#187486",8=>"#abcd12");
			for($i=0;$i < sizeof($centroids);$i++){ 
				?>
				paint('<?php echo "cent".($i+1); ?>',0,0,"<?php echo $colors[$i]; ?>",4,1);		
				<?php foreach($clusters[$i] as $register){ ?>
				paint('<?php echo "cent".($i+1); ?>',<?php echo rand(-70,70); ?>,<?php echo rand(-70,70); ?>,"<?php echo $colors[$i]; ?>",2,0);
				<?php 
					}
			} ?>
		</script>
			<!-- FIN PINTAR CANVAS -->
		</div>
		<!-- END TAB 1 -->

		<?php for($i=0;$i<sizeof($centroids);$i++){ ?>
		<div>
			<!-- START TAB  -->
			<div class="centroid_container">
				<!-- START Lista de informacion del centroid -->
				<table>
					<tbody>
						<tr>
							<td><div class="centroid_info">
									<H4>
										Información del Centriode
										<?php echo ($i+1);?>
									</H4>
									<!-- Numero del centroid -->
									<table>
										<tr valign="top">
											<td>
												<div class="ul_centroid">
													<!-- Informacion del centroid -->
													<ul>
														<?php
													foreach ($parameters as $parameter){?>
														<li><b><?php echo strtoupper($parameter);?>:</b>&nbsp;<?php echo $centroids[$i]->getParameter($parameter);
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
														<li><b><?php echo strtoupper($parameter);?>:</b>&nbsp;<?php echo $centroids[$i]->getParameter($parameter);
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
														<?php
														foreach($indexes as $key=>$value){
															foreach ($value as $key_val=>$val){
																if(($key==$i)||($key<=$i && $key_val==$i)){
																	?>
														<li><b>[<?php echo ($key+1); ?>] RESPECTO A [<?php echo ($key_val+1); ?>]
																=
														</b>&nbsp;&nbsp;<?php echo round($indexes[$key][$key_val],2);?><br />
														</li>
														<?php }
															}
														}?>
													</ul>
												</div>
											</td>
											<td>
												<div class="ul_centroid">
													<ul>

														<li><b>INTRA CLUSTER = </b>&nbsp;&nbsp;<?php echo round($index_inter[$i],2);?>
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
							if($parameter=="restecg"){
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
						foreach ($clusters[$i] as $register){
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
		<?php }?>
	</div>
	<!-- END TAB_CONTENTS 2 -->
</div>
<!-- END slidingDiv-->
<?php }
}?>
<?php }else{
	header("Location: index.php?home");
}?>