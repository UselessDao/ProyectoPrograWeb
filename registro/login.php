<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Iniciar sesion</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Iniciar sesion</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Usuario</label>
  		<input type="text" name="usuario" >
  	</div>
  	<div class="input-group">
  		<label>Clave</label>
  		<input type="password" name="clave">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Iniciar Sesion</button>
  	</div>
  	<p>
  		No eres miembro? <a href="registro.php">Registrate</a>
  	</p>
  </form>
</body>
</html>