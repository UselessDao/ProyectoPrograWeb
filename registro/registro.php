<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sistema de registro</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
  <form method="post" action="registro.php">
  	<?php include('error.php'); ?>
  	<div class="input-group">
  	  <label>Usuario</label>
  	  <input type="text" name="usuario" value="<?php echo $usuario; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="correo" value="<?php echo $correo; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Clave</label>
  	  <input type="password" name="clave">
  	</div>
  	<div class="input-group">
  	  <label>Confirmar clave</label>
  	  <input type="password" name="clave_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Registrarse</button>
  	</div>
  	<p>
  		Ya tiene cuenta? <a href="login.php">Iniciar Sesion</a>
  	</p>
  </form>
</body>
</html>