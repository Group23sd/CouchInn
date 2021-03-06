<?php

    require_once 'userSession.php';
    require_once 'database.php';
    require_once 'feedback.php';

    //Entra por mail
    if (isset($_GET['id']) && isset($_GET['code'])) {
        $id = $_GET['id'];
        $code = $_GET['code'];
        //Parametros correctos
        if (password_verify($id."g23sd",$code)) {
            $sql = "SELECT idusuario, confirmado FROM usuario WHERE idusuario = $id";
            $user = queryByAssoc($sql);
            //Usuario ya verificado
            if (!$user['confirmado']) {
                $sql = "UPDATE usuario SET confirmado = :confirmado WHERE idusuario = $id";
                $database = connectDatabase();
                $statement = $database -> prepare($sql);
                $statement -> bindValue(':confirmado', true, PDO::PARAM_BOOL);
                $statement -> execute();
                $sql = "SELECT idpermiso FROM permiso WHERE nombre = 'standard'";
                $idpermiso = queryByAssoc($sql)['idpermiso'];
                $now = date("Y-m-d H:i:s");
                $data = Array($id, $idpermiso, $now);
                $sql = "INSERT INTO permiso_usuario (idusuario, idpermiso, fecha) VALUES (?, ?, ?)";
                $statement = $database -> prepare($sql);
                $statement -> execute($data);
                accountConfirmed();
            } else {
                accountAlreadyConfirmed();
            }
        } else {
            wrongConfirmationCredentials();
        }
    } else {
        echo "<script type='text/javascript'>window.location='index.php'</script>";
    }

?>
