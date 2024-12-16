<?php include "../extend/header.php"; ?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content #e0f7fa cyan lighten-5">
                <center><span class="card-title">SUMA</span></center>
                <p>OPERACION SUMA</p>
            </div>
            <div class="card-content">
                <form action="ins_suma.php" method="POST">
                    <div class="input-field">
                        <input id="vs1" type="text" title="Sumando 01" name="vs1" required autofocus placeholder="Ingrese el primer número">
                        <label for="vs1">Sumando 01:</label>
                    </div>
                    <div class="input-field">
                        <input id="vs2" type="text" title="Sumando 02" name="vs2" required placeholder="Ingrese el segundo número">
                        <label for="vs2">Sumando 02:</label>
                    </div>
                    <p><button type="submit" class="btn black">Sumar<i class="material-icons">add</i></button></p>
                </form>
            </div>
            <div class="card">
                <div class="card-content #e0f7fa cyan lighten-5">
                    <div id="sumas"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "../extend/scripts.php"; ?>
<div class="fixed-action-btn vertical click-to-toggle">
    <a class="btn-floating red">
        <i class="material-icons" >mode_edit</i>
    </a>
    <ul>
        <li><a href="" class="btn-floating yellow"><i class="material-icons">add</i></a></li>
        <li><a href="" class="btn-floating orange"><i class="material-icons">replay</i></a></li>
        <li><a href="" class="btn-floating purple"><i class="material-icons" >repeat</i></a></li>
        <li><a href="" class="btn-floating pink"><i class="material-icons">send</i></a></li>
    </ul>
</div>
<script>
    $('.fixed-action-btn').openFAB();
</script>
</body>
</html>
