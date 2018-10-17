<?php
$servername = "localhost";
$username = "stapiadlt";
$password = "b27x1242";
$dbname = "prograweb";
$usuario = $_GET["usuario"];
$clave = $_GET["clave"];
$correo = $_GET["correo"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $sql = "INSERT INTO usuarios(usuarios, clave, correo) VALUES ('$usuario', '$clave','$correo'";

} else {
    echo "0 results";
}

if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>