<?php
// Incluir el archivo de conexión a la base de datos
include("conexion.php");
$con = conexion();

// Comprobar si se ha enviado un formulario con el método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idpersona'])) {
    // Obtener el valor del campo oculto 'idpersona' del formulario
    $id = $_POST['idpersona'];

    // Preparar la consulta SQL para eliminar el registro
    $sql = "DELETE FROM persona WHERE documento = $1";

    // Preparar y ejecutar la consulta con el ID proporcionado
    $result = pg_query_params($con, $sql, array($id));

    // Verificar si la consulta fue exitosa
    if ($result) {
        // Redirigir a la página principal después de eliminar
        header("Location: listar_grupoYCG.php?mensaje=eliminado");
        exit;
    } else {
        // Mostrar mensaje de error si algo salió mal
        echo "Error al eliminar el registro: " . pg_last_error($con);
    }
} else {
    // Redirigir si no se proporciona un ID válido o si no es una solicitud POST
    header("Location: index.php?mensaje=error");
    exit;
}

// Cerrar la conexión a la base de datos
pg_close($con);
?>
