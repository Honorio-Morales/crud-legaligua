<?php include '../extend/header.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));
$nombre = $con->real_escape_string(htmlentities($_GET['nombre']));
 ?>

<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Ingreso de la venta de: <?php echo $nombre ?> </span>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <h5 align="center"><b>DATOS GENERALES DE LA VENTA</b></h5>
        <form  action="ins_ventas.php" method="post" autocomplete="off" >
          <!--AJAX AQUI -->
        <div class="row">
          <div class="col s4">
            <select id="pago" name="pago" required="">
              <option value="" disabled selected>SELECCIONA TIPO DE PAGO</option>
              <?php $sel_tipo = $con->prepare("SELECT * FROM venta WHERE idVenta=1 or idVenta=2");
              $sel_tipo->execute();
              $res_tipo = $sel_tipo->get_result();
              while ($f_tipo =$res_tipo->fetch_assoc()) {?>
              <option value="<?php echo $f_tipo['pago'] ?>"><?php echo $f_tipo['pago'] ?></option>
              <?php }
              $sel_tipo->close();
               ?>
            </select>
          </div>
          <div class="col s4">
            <!-- Se inicializa-->
              <input type="date" class="datepicker" name="fecha_registro" id="fecha_registro" required >
              <label for="fecha_registro">Fecha de registro</label>
          </div>
         <div class="col s4">
          <select id="cli" name="cli" required="">
              <option value="" disabled selected>SELECCIONA CODIGO CLIENTE</option>
              <?php $sel_cli = $con->prepare("SELECT * FROM clientes");
              $sel_cli->execute();
              $res_cli = $sel_cli->get_result();
              while ($f_cli =$res_cli->fetch_assoc()) {?>
              <option value="<?php echo $f_cli['idClientes'] ?>"><?php echo $f_cli['idClientes'] ?></option>
              <?php }
              $sel_cli->close();
               ?>
            </select>
        </div>
        </div>
        <div class="row">
          <h5 align="center"><b>DETALLE DE LA VENTA|</b></h5>
          <div class="col s3">
            <select id="produ" name="produ" required="">
              <option value="" disabled selected>SELECCIONAR PRODUCTO</option>
              <?php $sel_produ = $con->prepare("SELECT * FROM productos");
              $sel_produ->execute();
              $res_produ = $sel_produ->get_result();
              while ($f_produ =$res_produ->fetch_assoc()) {?>
              <option value="<?php echo $f_produ['Nombre'] ?>"><?php echo $f_produ['Nombre'] ?></option>
              <?php }
              $sel_produ->close();
               ?>
            </select>
          </div><!--Termina Primer columna -->
          <div class="col s3">
            <select id="precio" name="precio" required="">
              <option value="" disabled selected>SELECCIONAR PRECIO</option>
              <?php $sel_precio = $con->prepare("SELECT * FROM productos");
              $sel_precio->execute();
              $res_precio = $sel_precio->get_result();
              while ($f_precio =$res_precio->fetch_assoc()) {?>
              <option value="<?php echo $f_precio['precio'] ?>"><?php echo $f_precio['precio'] ?></option>
              <?php }
              $sel_precio->close();
               ?>
            </select>
          </div><!--Termina Primer columna -->
          <div class="col s3">
            <div class="input-field">
              <input type="number" name="cantidad" id="cantidad"  >
              <label for="cantidad">Cantidad</label>
            </div>
          </div><!--Termina Primer columna -->
          <div class="col s3">
           <div class="input-field">
              <input type="text" name="total"  id="total">
              <label for="total">Total</label>
            </div>
          </div>
        </div>
        <center>
        <button type="submit" class="btn">Guardar</button>
        </center>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include '../extend/scripts.php'; ?>
<script src="../js/estados.js"></script>
</body>
</html>
