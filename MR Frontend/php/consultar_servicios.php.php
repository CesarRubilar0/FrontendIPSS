<?php
$servername = "localhost";
$username = "MR";
$password = "12345"; 
$dbname = "consultoria_db";

// conectando
$conn = new mysqli($servername, $username, $password, $dbname);

// falla enla conexion
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta de serviciio
$sql = "SELECT id, nombre, descripcion, valor_clp, valor_usd FROM servicios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Nuestros Servicios</h2>
        <div class="row g-4">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card h-100">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
                    echo '<p class="card-text">' . $row["descripcion"] . '</p>';
                    echo '<p><strong>Valor CLP:</strong> $' . number_format($row["valor_clp"], 0, ',', '.') . '</p>';
                    echo '<p><strong>Valor USD:</strong> $' . number_format($row["valor_usd"], 2) . '</p>';
                    echo '<a href="#contact" class="btn btn-primary w-100">Cotizar</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No hay servicios disponibles.";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php           
// Cerrar la conexió      