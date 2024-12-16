<nav class="black">
  <a href="" data-activates="menu" class="button-collapse">
    <i class="material-icons">menu</i>
  </a>
</nav>

<ul id="menu" class="side-nav fixed grey lighten-4">
  <li>
    <div class="userView">
      <div class="background">
        <img src="../img/LogoSistemas.png" width="300">
      </div>
      <a href="../perfil/index.php">
        <img src="../usuarios/<?php echo $_SESSION['foto']; ?>" class="circle" alt="">
      </a>
      <br><br><br>
      <a href="../perfil/perfil.php" class="green-text"><?php echo $_SESSION['nombre']; ?></a>
      <a href="" class="green-text"><?php echo $_SESSION['correo']; ?></a>
    </div>
  </li>

  <li><a href="../inicio"><i class="material-icons">home</i> INICIO</a></li>
  <li><div class="divider"></div></li>
  <li><a href="../usuarios/index.php"><i class="material-icons">contacts</i> ALTA USUARIOS</a></li>
  <li><div class="divider"></div></li>
  <li><a href="../productos/index.php"><i class="material-icons">beenhere</i> ALTA PRODUCTOS</a></li>
  <li><div class="divider"></div></li>
  <li><a href="../clientes/index.php"><i class="material-icons">beenhere</i> ALTA CLIENTES</a></li>
  <li><div class="divider"></div></li>
  <li><a href="../login/salir.php"><i class="material-icons">close</i> Salir</a></li>
  <li><div class="divider"></div></li>
</ul>
