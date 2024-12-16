<!--llama a la cabecera-->  
<?php include "../extend/header.php"; ?>
<?php include "../conexion/conexion.php"; ?>
<!--pagina principal-->  
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">ALTA DE PRODUCTOS</span>
        <form class="form" action="ins_producto.php" method="post" enctype="multipart/form-data" autocomplete="off">
          <!-- Producto -->
          <div class="input-field">
            <input type="text" name="producto" required autofocus title="Debe contener entre 1 y 15 caracteres, solo letras" pattern="[A-Za-z\s]{1,15}" id="producto" onblur="may(this.value, this.id)">
            <label for="producto">Producto:</label>
          </div>

          <!-- Estado -->
          <div class="input-field">
            <select name="estado" class="browser-default" required>
              <option value="" disabled selected>ELIGE EL ESTADO</option>
              <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
            </select>
          </div>

          <!-- Stock -->
          <div class="input-field">
            <input type="number" name="stock" required title="Cantidad de producto en stock" id="stock">
            <label for="stock">Stock:</label>
          </div>

          <!-- Precio -->
          <div class="input-field">
            <input type="number" name="precio" required title="Precio del producto" id="precio" step="0.01">
            <label for="precio">Precio:</label>
          </div>

          <!-- Botón Guardar -->
          <button type="submit" class="btn black" id="btn_guardar">Guardar <i class="material-icons">send</i></button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Tabla de productos -->
<?php 
$sel = $con->query("SELECT * FROM productos");
$row = mysqli_num_rows($sel);
?>
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Productos (<?php echo $row; ?>)</span>
        <table>
          <thead>
            <tr>
              <th>Producto</th>
              <th>Estado</th>
              <th>Stock</th>
              <th>Precio</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php while($f = $sel->fetch_assoc()) { ?>
              <tr>
                <td><?php echo $f['Nombre']; ?></td>
                <td>
                  <form action="up_estado.php" method="post"  >
                    <input type="hidden" name="id" value="<?php echo $f['idProductos']; ?>">
                    <select name="Estado" class="browser-default" required>
                      <option value="Activo" <?php if ($f['Estado'] == 'Activo') echo 'selected'; ?>>Activo</option>
                      <option value="Inactivo" <?php if ($f['Estado'] == 'Inactivo') echo 'selected'; ?>>Inactivo</option>
                    </select>
                    <button title="Actualizar Estado" type="submit" class="btn-floating"><i class="material-icons">repeat</i></button>
                  </form>
                </td>
                <td><?php echo $f['Stock']; ?></td>
                <td><?php echo $f['Precio']; ?></td>
                <td>
                  <!-- Eliminar Producto -->
                  <a href="#" class="btn-floating red" onclick="swal({ 
                    title: '¿Está seguro que desea eliminar el producto?', 
                    text: '¡No podrá recuperarlo!', 
                    type: 'warning', 
                    showCancelButton: true, 
                    confirmButtonColor: '#3085d6', 
                    cancelButtonColor: '#d33', 
                    confirmButtonText: 'Sí, eliminarlo!' 
                  }).then(function () { 
                    location.href='eliminar_producto.php?id=<?php echo $f['idProductos']; ?>'; 
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
