<?php
session_start();

$usuario = "";
$correo    = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'stapiadlt', 'b27x1242', 'prograweb');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $usuario = mysqli_real_escape_string($db, $_POST['usuario']);
  $correo = mysqli_real_escape_string($db, $_POST['correo']);
  $clave = mysqli_real_escape_string($db, $_POST['clave']);
  $clave_2 = mysqli_real_escape_string($db, $_POST['clave_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($usuario)) { array_push($errors, "Se requiere un usuario"); }
  if (empty($correo)) { array_push($errors, "Se requiere un correo"); }
  if (empty($clave)) { array_push($errors, "Se requiere una clave"); }
  if ($clave != $clave_2) {
	array_push($errors, "Las claves no coinciden");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM usuarios WHERE usuarios='$usuario' OR correo='$correo' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['usuario'] === $usuario) {
      array_push($errors, "El usuario ya existe");
    }

    if ($user['correo'] === $correo) {
      array_push($errors, "email ya registrado");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	

  	$query = "INSERT INTO usuarios(usuarios, clave, correo) VALUES ('$usuario', '$clave','$correo')";
  	mysqli_query($db, $query);
  	$_SESSION['usuario'] = $usuario;
  	$_SESSION['success'] = "Iniciaste sesion";
  	header('location: index.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
    $usuario = mysqli_real_escape_string($db, $_POST['usuario']);
    $clave = mysqli_real_escape_string($db, $_POST['clave']);
  
    if (empty($usuario)) {
        array_push($errors, "Se necesita un usuario");
    }
    if (empty($clave)) {
        array_push($errors, "Se necesita una clave");
    }
  
    if (count($errors) == 0) {
      
    $usuario = mysqli_real_escape_string($db, $_POST['usuario']);
        $query = "SELECT * FROM usuarios WHERE usuarios='$usuario' AND clave='$clave'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['usuario'] = $usuario;
          $_SESSION['success'] = "Iniciaste sesion";
          header('location: index.php');
        }else {
            array_push($errors, "Usuario o clave incorrectos");
        }
    }
  }
  
  ?>
