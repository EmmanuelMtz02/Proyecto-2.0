<?php
session_start();

if (isset($_SESSION['loggedin'])&& $_SESSION['loggedin'] == true) {

}else{
    echo "<script> alert('Debes de iniciar sesion.'); </script>";
    header("Refresh:0; url=index.html");
exit;
} 

?>
<?php

if(!isset($_GET["id"])) exit();
$id = $_GET["id"];

include_once "./bd/base_admin.php";

$sentencia = $base_de_datos -> prepare("DELETE FROM personal WHERE id = ?;");
$resultado = $sentencia-> execute([$id]);

if($resultado === TRUE){
    echo "<script> alert('Se ha eliminado el Alumno.');</script>";
    header("refresh:0; url=menu_bienvenida.php");
}
else{
    echo "<h2>Algo salio mal, verifica con el encargado de sistemas</h2>";
}
?>