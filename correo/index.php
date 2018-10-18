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
        
        $sql = "SELECT * FROM usuarios where usuarios = '$usuario'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
   
        while($row = $result->fetch_assoc()) {
        $clave = $row["clave"];
        $correo = $row["correo"];
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

