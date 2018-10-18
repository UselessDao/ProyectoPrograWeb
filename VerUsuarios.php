<?php
$servername = "localhost";
$username = "stapiadlt";
$password = "b27x1242";
$dbname = "prograweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
} 
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table border align=\"center\"><tr><td><strong>ID</strong></td><td><strong>Usuario</strong></td><td><strong>Clave</strong></td><td><strong>Correo</strong></td></tr>";
   
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["usuarios"]."</td><td>".$row["clave"]."</td><td>".$row["correo"]."</td></tr>";

    }
    echo "</table>";
} else {
    echo "0 resultados";
}
$conn->close();
?>