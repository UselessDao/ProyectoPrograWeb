<?php
$servername = "localhost";
$username = "stapiadlt";
$password = "b27x1242";
$dbname = "prograweb";
$usuario = $_REQUEST["usuario"];
$clave = $_REQUEST["clave"];
$correo = $_REQUEST["correo"];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $sql = "INSERT INTO usuarios(usuarios, clave, correo) VALUES ('$usuario', '$clave','$correo')";
} else {
    echo "0 results";
}
if ($conn->query($sql) === TRUE) {
    echo "Usuario registrado correctamente";

} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
