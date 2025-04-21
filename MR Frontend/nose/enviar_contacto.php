<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Permite solicitudes desde cualquier origen (¡cuidado en producción!)
header('Access-Control-Allow-Methods: POST, OPTIONS'); // Permite métodos POST y OPTIONS
header('Access-Control-Allow-Headers: Content-Type');

// Verifica
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Verifica post
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

// Obtener datos del formulario
$nombre = $_POST['nombre'] ?? '';
$email = $_POST['email'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$servicio = $_POST['servicio'] ?? '';
$mensaje = $_POST['mensaje'] ?? '';

// Validar datos (puedes agregar validaciones más robustas)
if (empty($nombre) || empty($email) || empty($telefono) || empty($servicio)) {
    http_response_code(400);
    echo json_encode(['error' => 'Por favor, complete todos los campos requeridos']);
    exit;
}

// Configuración de la base de datos
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

// Escapar datos para evitar inyección SQL
$nombre = $conn->real_escape_string($nombre);
$email = $conn->real_escape_string($email);
$telefono = $conn->real_escape_string($telefono);
$servicio = $conn->real_escape_string($servicio);
$mensaje = $conn->real_escape_string($mensaje);

// Insertar datos en la base de datos
$sql = "INSERT INTO contactos (nombre, email, telefono, servicio, mensaje) VALUES ('$nombre', '$email', '$telefono', '$servicio', '$mensaje')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['mensaje' => 'Mensaje enviado correctamente']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Error al enviar el mensaje: ' . $conn->error]);
}

$conn->close();
?>
<?php
// Cerrar la conexión