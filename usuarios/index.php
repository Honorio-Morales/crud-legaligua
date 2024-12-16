<!--llama a la cabecera-->  
<?php include "../extend/header.php"; ?>
<?php include "../conexion/conexion.php"; ?>
<!--pagina principal-->  
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">ALTA DE USUARIOS</span>
        <form class="form" action="ins_usuario.php" method="post" enctype="multipart/form-data" autocomplete="off">
          <!-- Nickname -->
          <div class="input-field">
            <input type="text" name="nick" required autofocus title="Debe contener entre 5 y 15 caracteres, solo letras" pattern="[A-Za-z]{5,15}" id="nick" onblur="may(this.value, this.id)">
            <label for="nick">Nick:</label>
          </div>

          <!-- Contraseña -->
          <div class="input-field">
            <input type="password" name="pass1" required title="Contraseña con números, letras mayúsculas y minúsculas entre 8 y 15 caracteres" pattern="[A-Za-z0-9]{8,15}" id="pass1">
            <label for="pass1">Contraseña:</label>
          </div>
          <div class="input-field">
            <input type="password" name="pass2" required title="Confirme la contraseña" pattern="[A-Za-z0-9]{8,15}" id="pass2">
            <label for="pass2">Verificar contraseña:</label>
          </div>

          <!-- Nivel de usuario -->
          <div class="input-field">
            <select name="nivel" class="browser-default" required>
              <option value="" disabled selected>ELIGE UN NIVEL DE USUARIO</option>
              <option value="ADMINISTRADOR">ADMINISTRADOR</option>
              <option value="ASESOR">ASESOR</option>
              <option value="VENDEDOR">VENDEDOR</option>

            </select>
          </div>

          <!-- Nombre completo -->
          <div class="input-field">
            <input type="text" name="nombre" required title="Nombre completo del usuario" id="nombre" onblur="may(this.value, this.id)" pattern="[A-Z\s]+" >
            <label for="nombre">Nombre completo del usuario:</label>
          </div>

          <!-- Correo electrónico -->
          <div class="input-field">
            <input type="email" name="correo" title="Correo electrónico válido" id="correo" required>
            <label for="correo">Correo electrónico:</label>
          </div>

          <!-- Foto -->
          <div class="file-field input-field">
            <div class="btn">
              <span>Foto:</span>
              <input type="file" name="foto">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>

          <!-- Botón Guardar -->
          <button type="submit" class="btn black" id="btn_guardar">Guardar <i class="material-icons">send</i></button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Buscador -->
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

<!-- Tabla de usuarios -->
<?php 
$sel = $con->query("SELECT * FROM usuario");
$row = mysqli_num_rows($sel);
?>
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Usuarios (<?php echo $row; ?>)</span>
        <table>
          <thead>
            <tr>
              <th>Nick</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Nivel</th>
              <th>Foto</th>
              <th>Bloqueo</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php while($f = $sel->fetch_assoc()) { ?>
              <tr>
                <td><?php echo $f['nick']; ?></td>
                <td><?php echo $f['nombre']; ?></td>
                <td><?php echo $f['correo']; ?></td>
                <td>
                  <form action="up_nivel.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $f['idUsuario']; ?>">
                    <select name="nivel" class="browser-default" required>
                      <option value="ADMINISTRADOR" <?php if ($f['nivel'] == 'ADMINISTRADOR') echo 'selected'; ?>>ADMINISTRADOR</option>
                      <option value="ASESOR" <?php if ($f['nivel'] == 'ASESOR') echo 'selected'; ?>>ASESOR</option>
                      <option value="VENDEDOR" <?php if ($f['nivel'] == 'VENDEDOR') echo 'selected'; ?>>VENDEDOR</option>
                    </select>
                    <button title="Actualizar Estado" type="submit" class="btn-floating"><i class="material-icons">repeat</i></button>
                  </form>
                </td>
                <td><img src="<?php echo $f['foto']; ?>" width="50" class="circle"></td>
                <td>
                  <a href="bloqueo_manual.php?us=<?php echo $f['idUsuario']; ?>&bl=<?php echo $f['bloqueo']; ?>">
                    <i class="material-icons <?php echo $f['bloqueo'] == 1 ? 'green-text' : 'red-text'; ?>">
                      <?php echo $f['bloqueo'] == 1 ? 'lock_open' : 'lock_outline'; ?>
                    </i>
                  </a>
                </td>
                <td>
                  <a href="#" class="btn-floating red" onclick="swal({ 
                    title: '¿Está seguro que desea eliminar al usuario?', 
                    text: '¡No podrá recuperarlo!', 
                    type: 'warning', 
                    showCancelButton: true, 
                    confirmButtonColor: '#3085d6', 
                    cancelButtonColor: '#d33', 
                    confirmButtonText: 'Sí, eliminarlo!' 
                  }).then(function () { 
                    location.href='eliminar_usuario.php?id=<?php echo $f['idUsuario']; ?>'; 
                  })">
                    <i class="material-icons">clear</i>
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>
</body>
</html>
