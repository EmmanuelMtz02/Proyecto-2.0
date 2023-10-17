<?php
if(
    !isset($_POST['nombre'])||
    !isset($_POST['pass'])||
    !isset($_POST['id'])||
)exit();

include_once "../bd/base_admin.php";
$id = $_POST['id']
$id = $_POST['nombrec']
$id = $_POST['pass']

$sentencia = $base_de_datos->prepare("UPDATE usuarios SET
                             nombre = '$nombrec',
                             pass = '$pass',
                             WHERE id = '$id',
                             ");

$sentencia = $sentencia->execute([$id, $nombrec, $pass]);

if($resultado == true){
    echo "<script>alert('Los datos se han actualizando correctaente.')</script>";
    echo "<script>alert('Se redireccionaria al menu de bieenvenida.')</script>";
    header('refresh:0 url="menu_bienvenida.php');
    }else{
        echo "<h2>Algo salio mal, verifica que la tabla exista</h2>";
    }
?>
