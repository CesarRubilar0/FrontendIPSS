<?php
header('Content-Type: application/json');

// Configuración de la base de datos (reemplaza con tus credenciales reales)
$servername = "localhost";
$username = "MR";
$password = "12345";
$dbname = "consultoria_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(['error' => 'Conexión fallida: ' . $conn->connect_error]));
}

// Endpoint para obtener servicios
if ($_GET['endpoint'] === 'servicios') {
    $sql = "SELECT id, nombre, descripcion, valor_clp, valor_usd FROM servicios";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $servicios = array();
        while($row = $result->fetch_assoc()) {
            $servicios[] = $row;
        }
        echo json_encode($servicios);
    } else {
        echo json_encode([]);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Endpoint no encontrado']);
}

$conn->close();
?>
<?php
// Cerrar la conexión
