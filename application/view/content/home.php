<?php  if(isset($_GET['log']) && !empty($_GET['log'])){
	@session_destroy();
	?>
<div id="popup_message" title="SALIR">
	<p>Ha cerrado sesion!.</p>
</div>
<?php }?>
<script>
$(function() {
    $( "#popup_message" ).dialog();
  });
</script>
<div id="wrapper">
	<ul class="rslides" id="slider1">
		<li><img src="img/1.jpg" alt=""></li>
		<li><img src="img/2.jpg" alt=""></li>
		<li><img src="img/3.jpg" alt=""></li>
	</ul>
</div>
