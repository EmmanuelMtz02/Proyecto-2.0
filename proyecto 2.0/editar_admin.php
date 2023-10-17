 <?php
session_start();

if (isset($_SESSION['loggedin'])&& $_SESSION['loggedin'] == true) {

}else{
    echo "<script> alert('Debes de iniciar sesion.'); </script>";
    header("Refresh:0; url=index.html");
exit();
} 
?>
<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "./bd/base_admin.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM personal WHERE id = ?;");
$sentencia->execute([$id]);
$solicitud = $sentencia->fetch(PDO::FETCH_OBJ);
if($solicitud === FALSE){
    echo "¡No existe alguna solicitud con ese ID!";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../images/icono-pagina.png">
    <link rel="stylesheet" href="../css/hoja_estilo.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <title>Editar Usuario</title>
</head>
<body>
    
    <div class="nav-bg">
        <nav class="navegacion-principal">
            <a href="cerrar_sesion.php" class="enlace-logout" onclick="cerrar_sesion()"></a>
        </nav>
    </div>
    <h2 class="usuarios-registrados">Editar Usuario</h2>
    <div class="menu-bienvenida">
        <a href="menu_bienvenida.php" class="registrar-admin">Inicio</a>
        <a href="#" class="registrar-admin">Registrar Alumno</a>
    </div>
    <br><br>
    <div class="Informacion">
        <div class="imagen-formulario">
            <img src="../images/formulario.png" alt="" class="imagen">
        </div>
        <div>
            <form action="actualizar_informacion.php" method="post" class="formulario-editar">
                <div class="id">
                    <label for="">No.</label>
                    <br>
                    <input type="text" value="<?php echo $solicitud->id?>" name="id" id="" class="input-formulario-id" readonly>
                </div>
                <div class="nombrec">
                    <label for="">Nombre Completo</label>
                    <br>
                    <input type="text" value="<?php echo $solicitud->usuario?>" name="nombrec" id="" class="input-formulario">
                </div>
                <div clas="pass">
                    <label for="">Contraseña</label>
                    <br>
                    <input type="text" value="<?php echo $solicitud->password?>" name="pass" id="" class="input-formulario">
                </div>
                <div clas="submit">
                    <input type="submit" value="Actualizar Informacion" class="actualizar-datos">
                </div>
            </form>
        </div>
    </div>
</body>
</html>