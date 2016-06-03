<?php

    require_once 'userSession.php';

    if ( (isset($_POST['userEmail'])) && (!$_SESSION['user']->islogged()) ) {
        require_once 'database.php';
        $email = $_POST['userEmail'];
        $query = "SELECT idusuario, nombre, apellido FROM usuario WHERE email = '$email'";
        $result = queryByAssoc($query);
        if ($id = $result['idusuario']) {
            $name = $result['nombre']." ".$result['apellido'];
            sendPasswordResetEmail($id, $email, $name);
        } else {
            //Placeholder
            echo "<script type='text/javascript'>alert('La cuenta no existe');";
            echo "window.location='index.php'</script>";
        }
        //Placeholder
        echo "<script type='text/javascript'>alert('Solo se incluye');";
        echo "window.location='index.php'</script>";
    }

    function sendPasswordResetEmail($id, $email, $name) {

        require_once '../mail/PHPMailerAutoload.php';

        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "couchinn.international@gmail.com";
        $mail->Password = "group23sd";
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;

        $mail->From = "couchinn.international@gmail.com";
        $mail->FromName = "CouchInn.com";

        $mail->addAddress("$email", "$name");

        $mail->isHTML(true);

        $mail->Subject = "Password Reset Email";
        $mail->Body = mailBody($id, $email);
        $mail->AltBody = resetPasswordLink($id, $email);

        try {
            $mail->send();
            //Placeholder
            echo "<script type='text/javascript'> alert('Email enviado');";
            echo "window.location='index.php'</script>";
        } catch (Exception $e) {
            //Placeholder
            echo "<script type='text/javascript'> alert('".$e->errorMessage()."');";
            echo "window.location='index.php'</script>";
        }

    }

    function resetPasswordLink($id, $email) {
        $hashedId = password_hash($id.'g23sd', PASSWORD_DEFAULT);
        $hashedAccount = password_hash($email.'g23sd', PASSWORD_DEFAULT);
        return ("http://localhost/php/passwordResetForm.php?id=".$id."&idcode=".$hashedId."&account=".$email."&accountcode=".$hashedAccount);
    }

    function mailBody($id, $email) {
        return "<a href=".resetPasswordLink($id, $email).">Cambia tu password</a>";
    }

?>
