<?php
// Incluye la conexión a la base de datos
include '../conexion/conexion.php';


// Verifica si se recibió el ID por el método GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obtener los datos actuales del cliente
    $stmt = $con->prepare("SELECT * FROM clientes WHERE idClientes = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Cliente no encontrado.";
        exit;
    }
    $stmt->close();
} else {
    echo "ID no proporcionado.";
    exit;
}

// Maneja el formulario de actualización
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $fechoingreso = $_POST['fechoingreso'];

    $stmt = $con->prepare("UPDATE clientes SET nombres = ?, apellidos = ?, correo = ?, telefono = ?, fechoingreso = ? WHERE idClientes = ?");
    $stmt->bind_param('sssssi', $nombres, $apellidos, $correo, $telefono, $fechoingreso, $id);

    if ($stmt->execute()) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: '¡Datos actualizados!',
            text: 'El cliente ha sido modificado correctamente.',
        }).then(() => {
            window.location = 'index.php';
        });
        </script>";
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo actualizar el cliente.',
        });
        </script>";
    }

    $stmt->close();
    exit;
}
?>

<!-- Formulario para modificar los datos -->
<?php include '../extend/header.php'; ?>
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Modificar Cliente</span>
        <form method="post">
          <!-- Nombres -->
          <div class="input-field">
            <input type="text" name="nombres" required value="<?php echo $row['nombres']; ?>" id="nombres">
            <label for="nombres">Nombres:</label>
          </div>
          <!-- Apellidos -->
          <div class="input-field">
            <input type="text" name="apellidos" required value="<?php echo $row['apellidos']; ?>" id="apellidos">
            <label for="apellidos">Apellidos:</label>
          </div>
          <!-- Correo -->
          <div class="input-field">
            <input type="email" name="correo" required value="<?php echo $row['correo']; ?>" id="correo">
            <label for="correo">Correo:</label>
          </div>
          <!-- Teléfono -->
          <div class="input-field">
            <input type="text" name="telefono" required value="<?php echo $row['telefono']; ?>" id="telefono">
            <label for="telefono">Teléfono:</label>
          </div>
          <!-- Fecha de Ingreso -->
          <div class="input-field">
            <input type="date" name="fechoingreso" required value="<?php echo $row['fechoingreso']; ?>" id="fechoingreso">
            <label for="fechoingreso">Fecha de Ingreso:</label>
          </div>
          <!-- Botón de guardar -->
          <button type="submit" class="btn black">Actualizar Cliente <i class="material-icons">send</i></button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include '../extend/scripts.php'; ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const elems = document.querySelectorAll('select');
  M.FormSelect.init(elems);
});
</script>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
