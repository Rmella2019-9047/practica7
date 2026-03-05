<?php
$host = 'db';
$user = 'root';
$pass = 'root';
$db = 'itla';

$connection = new mysqli($host, $user, $pass, $db);

if ($connection->connect_error) {
    die("Fallo de coneccion: ".$connection->connect_error);
}

$connection->query("CREATE TABLE IF NOT EXISTS messages (id INT AUTO_INCREMENT PRIMARY KEY, message VARCHAR(255), date DATE)");
$connection->query("INSERT INTO messages (id, message, date) VALUES (1, 'Hola Mundo', '2021-01-01')");

$result = $connection->query("SELECT * FROM messages ORDER BY id DESC LIMIT 1");
$row = $result->fetch_assoc();

echo "<H1> Mensaje: " . $row['message'] . "</H1>";
echo "<H2> Fecha: " . $row['date'] . "</H2>";
echo "<p>Conexion a la base de datos exitosa</p>";

$connection->close();
?>
