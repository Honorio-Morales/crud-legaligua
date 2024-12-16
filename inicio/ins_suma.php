<?php
$s1 = $_POST['vs1'];
$s2 = $_POST['vs2'];
$suma = $s1 + $s2;
?>

<?php include "../extend/header.php"; ?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">SUMA</span>
                <p>RESULTADO DE LA SUMA</p>
            </div>
            <div class="card-content">
                <?php
                if ($suma >= 0) {
                    echo "<label style='color:green;'>La suma es: " . $suma . "</label>";
                } else {
                    echo "<label style='color:red;'>La suma no existe</label>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "../extend/scripts.php"; ?>
</body>
</html>