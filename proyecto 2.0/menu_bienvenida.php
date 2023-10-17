<?php
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

}else{
    echo "<script> alert('Debes de inicia sesion.'); </script>";
    header("Refresh:0; url=index.html");
    exit;
}
$now = time();

if($now > $_SESSION['expire']){
    session_destroy(); //Destruye la variable session_star();
    header("Refresh:0; url=index.html");
    exit;
}
?>
<!--Documento de seleccionar la tabla de datos -->
<?php
include_once "bd/base_admin.php";
$sentencia = $base_de_datos ->fetchALL(PDO::fetch_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="colores.css">
    <link real ="icon" href="./images/icono-pagina.pnp">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <title><?php echo "Alumno:" .$_SESSION['user'];?></title>
</head>
<body>
    <script src="./js/imagen.js"></script>
    <script src="./js/logout.js"></script>

<div class="content">
    <img src="./imagen/5.jpg" class="logo">
</div>
<div class="content2">
<div class="nav-bg">
    <nav class="navegacion-principal">
        <a href="cerrar_sesion.php" class="enlace-logout" onclick="cerrar_sesion()"></a>
    </nav>
</div>
<h2 class="usuarios-registrados">Alunmos registrados</h2>
<div class="menu-bienvenida">
    <a href="menu-bienvenida.php" class="registrar_admin">Actualizar</a>
    <a href="#" class="registrar_admin">Registrar Alumno</a>
</div>
<br><br>
 <table>
    <thead>
      <tr>
        <td>No.</td>
        <td>Usuario</td>
        <td>Password</td>
        <td>Editar</td>
        <td>Eliminar</td>
      </tr>
    </thead>
    <tbody>
        <?php foreach($solicitudes as $solicitud) { ?>
           <tr>
            <td><?php echo $solicitud ->id ?></td>
            <td><?php echo $solicitud ->usuario ?></td>
            <td><?php echo $solicitud ->password ?></td>
            <td><a href="<?php echo "editar_admin.php?id=" . $solicitud ->id ?>"><div><img src="../images/editar-usuario.png" clas="imagen-boton"></div></a></td>
            <td><a href="<?php echo "eliminar_admin.php?id=" . $solicitud ->id ?>"><div><img src="../images/eliminar-usuario.png" clas="imagen-boton"></div></a></td>
           </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>