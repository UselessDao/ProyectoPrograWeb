<?php 
  session_start(); 

  if (!isset($_SESSION['usuario'])) {
  	$_SESSION['msg'] = "Debes iniciar sesion";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['usuario']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Pagina de Inicio</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['usuario'])) : ?>
    	<p>Bienvenido <strong><?php echo $_SESSION['usuario']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">Cerrar Sesion</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>