<!--llama a la cabecera-->
<?php include "../extend/header.php";?>
<!--pagina principal--> 
<div class="row">
<div class="col s12">
	<div class="card">
		<div class="card-content #e0f7fa cyan lighten-5">
			<center><span class="card-title">VENTAS</span></center>
				<p>ALTA DE VENTAS</p>
				<div class="input-field">
					<input type="text" name="descripcion" required autofocus title="DEBE DE CONTENER ENTRE 8 Y
					15 CARACTERES, SOLO LETRAS" pattern="[A-Za-z](4,15)" id="descripcion" onblur="may(this.value,
					this.id)">
					<label for="descripcion">Venta:</label>
				</div>
				<div class="validar"></div>
			</div>
		</div>
	</div>
</div>
<!--terminael body y footer-->
<?php include "../extend/scripts.php"; ?>
<!--botones flotantes-->
<div class="fixed-action-btn vertical click-to-toggle" >
	<a class="btn-floating red">
		<i class="material-icons" >mode_edit</i>
	</a>
		<ul>
			<li><a href="" class="btn-floating yellow"><i class="material-icons">add</i></a></li>
			<li><a href="" class="btn-floating orange"><i class="material-icons">replay</i></a></li>
			<li><a href="" class="btn-floating purple"><i class="material-icons">repeat</i></a></li>
			<li><a href="" class="btn-floating pink"><i class="material-icons">send</i></a></li>
		</ul>
</div>
	<script>
		$('.fixed-action-btn').openFAB();
	</script>
</body>
</html>