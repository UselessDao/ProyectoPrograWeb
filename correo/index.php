<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Recupera tu contraseña</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="main">
            <h1>Recupera tu contraseña</h1>
            <div id="login">
                <h2>Envio al correo</h2>
                <hr/>
                <form action="index.php" method="post">
                    <input type="text" placeholder="Enter your Gmail ID" name="email"/>
                    <input type="password" placeholder="Enter your Gmail Password" name="password"/>
                    <input type="text" placeholder="To : Email Id " name="toid"/>  
                    <input type="text" placeholder="Subject : " name="subject"/>
                    <textarea rows="4" cols="50" placeholder="Enter Your Message..." name="message"></textarea>
                    <input type="submit" value="Send" name="send"/>
                </form>    
            </div>
        </div>
          <?php
          require 'phpmailer/PHPMailerAutoload.php';
          $servername = "localhost";
          $username = "stapiadlt";
          $password = "b27x1242";
          $dbname = "prograweb";
          $usuario = $_REQUEST["usuario"];
          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        echo "el usuario es: $usuario";
        $sql = "SELECT * FROM usuarios where usuarios = '$usuario'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
   
        while($row = $result->fetch_assoc()) {
        $clave = $row["clave"];
        $correo = $row["correo"];
        echo "$clave $correo";
        $email = 'prograweb701@gmail.com';                  
        $password = 'b27x1242';
        $to_id = $correo;
        $message = $clave;
        $subject = 'Recuperacion de clave';

        $mail = new PHPMailer;

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';

        $mail->Port = 587;

        $mail->SMTPSecure = 'tls';

        $mail->SMTPAuth = true;

        $mail->Username = $email;

        $mail->Password = $password;

        $mail->setFrom('prograweb701@gmail.com', 'Curso Programacion web');

        $mail->addAddress($to_id);

        $mail->Subject = $subject;

        $mail->msgHTML($message);

        if (!$mail->send()) {
           $error = "Mailer Error: " . $mail->ErrorInfo;
            ?><script>alert('<?php echo $error ?>');</script><?php
        } 
        else {
           echo '<script>alert("Contraseña enviada!");</script>';
        }
        }
        
        } else {
            echo "Usuario no registrado";
        }
        
        if ($conn->query($sql) === TRUE) {
            echo "Contraseña enviada!";
            
        } else {
            echo "Error: " . $conn->error;
        }
        
               $conn->close();
        ?>
    </body>
</html>
