<!-- Llama a la cabecera -->
<?php include "../extend/header.php"; ?>

<!-- Página principal -->
	<div class="row">
	<div class="col s12">
		<div class="card">
		<div class="card-content #e0f7fa cyan lighten-5">
			<center><span class="card-title">INICIO</span></center>
			<p>PAGINA PRINCIPAL</p>
		</div>
		</div>
	</div>
	</div>

	<!-- Termina el body y footer -->
	<?php include "../extend/scripts.php"; ?>

	<!-- Botones flotantes -->
	<div class="fixed-action-btn vertical click-to-toggle">
	<a class="btn-floating red">
		<i class="material-icons">mode_edit</i>
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
