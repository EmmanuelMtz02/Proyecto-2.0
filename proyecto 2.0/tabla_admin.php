<?php
    // Incluir el archivo de conexión a la base de datos
    include_once "bd/base_admin.php";
    // Realiza una consulta a la base de datos
    $sentencia = $base_de_datos->query('SELECT * FROM personal');
    // Obtiene todos los resultados de la consulta en un array de objetos
    $conec = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/colores.css">
    <title>Base de Datos</title>
</head>
<body>
    <br>
    <a href="index.html" class="cerrar_sesion">Cerrar Sesión</a>
    <br><br><br><br><br>
    
    <table>
        <thead>
            <tr class="tr-title">
                <th>No.</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    foreach ($conec as $conexion_tabla) { ?>
                        <tr class="tr-registro">
                            <td><?php echo $conexion_tabla->id ?></td>
                            <td><?php echo $conexion_tabla->usuario?></td>
                            <td><a href="<?php echo "editar_admin.php?id=" . $conexion_tabla ->id ?>"><div><img src="./imagenes/editar-usuario.png" clas="imagen-boton" height="40"></div></a></td>
                            <td><a href="<?php echo "eliminar_admin.php?id=" . $conexion_tabla ->id ?>"><div><img src="./imagenes/eliminar-usuario.png" clas="imagen-boton" height="40"></div></a></td>         
                        </tr>
                <?php } ?>
        </tbody>
    </table>
    <br><br>
</body>
</html>