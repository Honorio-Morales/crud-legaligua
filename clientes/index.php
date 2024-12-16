<?php 
// Incluye la conexión a la base de datos
include '../conexion/conexion.php';

// Incluye la cabecera
include '../extend/header.php';
?>

<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Registrar Cliente</span>
        <form class="form" action="ins_cliente.php" method="POST" autocomplete="off">
          <!-- Formulario de registro de cliente -->
          <div class="input-field">
            <input type="text" name="nombres" required id="nombres" onblur="may(this.value, this.id)">
            <label for="nombres">Nombres</label>
          </div>
          <div class="input-field">
            <input type="text" name="apellidos" required id="apellidos" onblur="may(this.value, this.id)">
            <label for="apellidos">Apellidos</label>
          </div>
          <div class="input-field">
            <input type="email" name="correo" required id="correo">
            <label for="correo">Correo</label>
          </div>
          <div class="input-field">
            <input type="text" name="telefono" required id="telefono">
            <label for="telefono">Teléfono</label>
          </div>
          <p>Fecha de ingreso</p>
          <div class="input-field">
            <input type="date" name="fechoingreso" required id="fechoingreso">
            <label for="fechoingreso"></label>
          </div>
          <div class="input-field">
            <input type="text" name="asesor" id="asesor" required onblur="may(this.value, this.id)">
            <label for="asesor">Asesor</label>
          </div>
          <button type="submit" class="btn black">Registrar <i class="material-icons">send</i></button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <nav class="brown lighten-3">
      <div class="nav-wrapper">
        <div class="input-field">
          <input type="search" id="buscar" autocomplete="off">
          <label for="buscar"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </div>
    </nav>
  </div>
</div>

<!-- Listado de usuarios -->
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Clientes Registrados</span>
        <?php
        // Consulta para obtener los datos de la tabla clientes
        $sel = $con->query("SELECT * FROM clientes");
        $row = mysqli_num_rows($sel);
        ?>
        <p>Total de clientes: <?php echo $row; ?></p>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Correo</th>
              <th>Teléfono</th>
              <th>Fecha de Ingreso</th>
              <th>Asesor</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($f = $sel->fetch_assoc()) { 
              // Verificar si el cliente está bloqueado
              $idCliente = $f['idClientes'];
              $verificar = $con->query("SELECT * FROM bloqueados WHERE idClientes = '$idCliente'");
              $bloqueado = $verificar->num_rows > 0;
            ?>
              <tr>
                <td><?php echo $f['idClientes']; ?></td>
                <td><?php echo $f['nombres']; ?></td>
                <td><?php echo $f['apellidos']; ?></td>
                <td><?php echo $f['correo']; ?></td>
                <td><?php echo $f['telefono']; ?></td>
                <td><?php echo $f['fechoingreso']; ?></td>
                <td><?php echo $f['asesor']; ?></td>
                <td>
                  <!-- Botón para eliminar -->
                  <a href="#" class="btn-floating red" onclick="swal({
                    title: '¿Está seguro de eliminar este cliente?',
                    text: '¡Esta acción no se puede deshacer!',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar'
                  }).then(function() {
                    location.href='eliminar_cliente.php?idClientes=<?php echo $f['idClientes']; ?>';
                  })">
                    <i class="material-icons">clear</i>
                  </a>

                  <!-- Botón para editar -->
                  <a href="modificar_cliente.php?id=<?php echo $f['idClientes']; ?>" class="btn-floating orange">
                    <i class="material-icons">edit</i>
                  </a>

                  <!-- Botón para bloquear/desbloquear -->
                  <?php if ($bloqueado) { ?>
                    <!-- Botón para desbloquear -->
                    <a href="#" class="btn-floating green" onclick="swal({
                      title: '¿Está seguro de desbloquear este cliente?',
                      text: '¡Esta acción cambiará su estado!',
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Sí, desbloquear'
                    }).then(function() {
                      location.href='bloquear_cliente.php?idClientes=<?php echo $f['idClientes']; ?>&accion=desbloquear';
                    })">
                      <i class="material-icons">lock_open</i>
                    </a>
                  <?php } else { ?>
                    <!-- Botón para bloquear -->
                    <a href="#" class="btn-floating yellow darken-1" onclick="swal({
                      title: '¿Está seguro de bloquear este cliente?',
                      text: '¡Esta acción cambiará su estado!',
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Sí, bloquear'
                    }).then(function() {
                      location.href='bloquear_cliente.php?idClientes=<?php echo $f['idClientes']; ?>&accion=bloquear';
                    })">
                      <i class="material-icons">lock</i>
                    </a>
                  <?php } ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php
// Incluye los scripts necesarios
include '../extend/scripts.php';
?>
<script src="../js/validacion.js"></script>
</body>
</html>
