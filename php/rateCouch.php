<?php
  require_once "database.php";
  require_once "feedback.php";

$idreserva = $_GET['idReserva'];
if (isset($_POST['comentario']) && isset($_POST['rating'])) {
  try {
    $comentario = $_POST['comentario'];
    $puntaje = $_POST['rating'];
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $today = getdate();
    $fecha = date("$today[year]-$today[mon]-$today[mday] $today[hours]:$today[minutes]:$today[seconds]");
    $sql = "UPDATE reserva SET puntaje_couch='$puntaje', puntaje_couch_comentario='$comentario', puntaje_couch_fecha='$fecha' WHERE idreserva=$idreserva";
    $connect = connectDatabase();
    $statement = $connect-> prepare($sql);
    $statement -> execute();
    successRateCouch();
  } catch (Exception $e) {
    genericError();
  }
}
  elseif (!isset($_POST['comentario']) && isset($_POST['rating'])) {
    try {
      $puntaje = $_POST['rating'];
      date_default_timezone_set('America/Argentina/Buenos_Aires');
      $today = getdate();
      $fecha = date("$today[year]-$today[mon]-$today[mday]");
      $sql = "UPDATE reserva SET puntaje_couch='$puntaje', puntaje_couch_fecha='$fecha' WHERE idreserva=$idreserva";
      $connect = connectDatabase();
      $statement = $connect-> prepare($sql);
      $statement -> execute();
      successRateCouch();
    } catch (Exception $e) {
      genericError();
    }

  }











  ?>
