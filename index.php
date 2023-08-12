<?php
  require_once 'controller/ViagemController.php';
   
  $viagemcontroller = new ViagemController();

  if(isset($_POST['partida'])) {
    $viagemcontroller->buscar($_POST['partida_value'], $_POST['destino_value'], $_POST['ida'], $_POST['volta']);
  } else {
    $viagemcontroller->listar();
  }
?>