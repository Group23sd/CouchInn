<?php

    if(isset($_POST['nombreDelTipo'])){
      require_once 'database.php';
      $nuevoTipo= $_POST['nombreDelTipo'];
      $query="SELECT * FROM tipo WHERE descripcion='$nuevoTipo'";
      $result=queryAllByAssoc($query);

      if(empty($result)){
        try{

          $data = array($nuevoTipo);
          $sql = "INSERT INTO tipo (descripcion) VALUES (?)";
          $database = connectDatabase();
          $statement = $database -> prepare($sql);
          $statement -> execute($data);

      }
      catch (Exception $e) {
          echo "<script type='text/javascript'>alert('".$e->getMessage()."');";
          echo "window.location='index.php'</script>";
      }

      echo "<script type='text/javascript'>alert('El nuevo tipo de couch fue cargado exitosamente!');";
      echo "window.location='listar_tCouch.php'</script>";

      }

    else{
      echo "<script type='text/javascript'>alert('IMPOSIBLE AGREGAR.Este tipo de couch ya existe!');";
      echo "window.location='listar_tCouch.php'</script>";
    }
  }

?>
