<?php
include("conexion.php");
$con = conexion();

// Obtener los datos del formulario
$doc = $_POST["doc"];
$nom = $_POST["nom"];
$ape = $_POST["ape"];
$dir = $_POST["dir"];
$cel = $_POST["cel"];

// Verificar si el documento ya existe
$sqlCheck = "SELECT documento FROM persona WHERE documento = $1";
$resultCheck = pg_query_params($con, $sqlCheck, array($doc));

if (pg_num_rows($resultCheck) > 0) {
    // El documento ya existe, redirigir con un mensaje de error
    header("Location: listar_grupoYCG.php?error=duplicado");
    exit;
} else {
    // Preparar la consulta SQL para insertar el registro
    $sql = "INSERT INTO persona (documento, nombre, apellido, direccion, celular) VALUES ($1, $2, $3, $4, $5)";
    $result = pg_query_params($con, $sql, array($doc, $nom, $ape, $dir, $cel));

    // Verificar si la inserción fue exitosa
    if ($result) {
        // Redirigir a la página principal con un mensaje de éxito
        header("Location: listar_grupoYCG.php?mensaje=registrado");
    } else {
        // Mostrar mensaje de error si algo salió mal
        header("Location: listar_grupoYCG.php?error=insert");
    }
    exit;
}

// Cerrar la conexión a la base de datos
pg_close($con);
?>
