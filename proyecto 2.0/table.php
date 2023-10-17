<?php
    // Incluir el archivo de conexión a la base de datos
    include_once "bd/base_de_datos.php";
    // Realiza una consulta a la base de datos
    $sentencia = $base_de_datos->query('SELECT * FROM alumnoslia');
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
    <form class="buscador" method="post" action="">
        <label for="fecha" class="buscar">Buscar por Fecha:</label>
        <input  class="fecha" type="date" id="fecha" name="fecha" required>
        <button type="submit" class="boton">Buscar</button>
    </form>
    <a href="menu_bienvenida.php" class="editar_admin">Editar Administradores</a>
    <a href="index.html" class="cerrar_sesion">Cerrar Sesión</a>
    <br><br><br><br><br>
    
    <table>
        <thead>
            <tr class="tr-title">
                <th>No.</th>
                <th>Nombre Completo</th>
                <th>Carrera</th>
                <th>Semestre</th>
                <th>Docente</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
                <?php 
                
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $fechaBuscada = $_POST["fecha"];
                        $fechaBuscada = date("Y-m-d", strtotime($fechaBuscada));

                        // Realiza una consulta a la base de datos para buscar registros con la fecha especificada
                        $consulta = $base_de_datos->prepare("SELECT * FROM alumnoslia");
                        $consulta->bindParam(':fecha', $fechaBuscada);
                        $consulta->execute();
                        $conec = $consulta->fetchAll(PDO::FETCH_OBJ);
                    }

                    foreach ($conec as $conexion_tabla) { ?>
                        <tr class="tr-registro">
                            <td><?php echo $conexion_tabla->id ?></td>
                            <td><?php echo $conexion_tabla->Nombre ?></td>
                            <td><?php echo $conexion_tabla->Carrera ?></td>
                            <td><?php echo $conexion_tabla->Semestre ?></td>
                            <td><?php echo $conexion_tabla->Docente ?></td>
                            <td><?php echo $conexion_tabla->Fecha ?></td>
                        </tr>
                <?php } ?>
        </tbody>
    </table>
    <br><br>
</body>
</html>