<?php
require_once 'model/Viagem.php';
require_once 'CidadeController.php';
 
class ViagemController {
   public function listar() {
      $viagem = new Viagem();
      $viagens = $viagem->listAll();

      $cidadecontroller = new CidadeController();
      $cidades = $cidadecontroller->listarFormat();

      $_REQUEST['viagens'] = $viagens;
      $_REQUEST['cidades'] = $cidades;

      require_once 'view/Viagem.php';
   }

   public function buscar($partida, $destino, $ida, $volta) {
      $viagem = new Viagem();
      $viagens = $viagem->listBySearch($partida, $destino, $ida, $volta);

      $cidadecontroller = new CidadeController();
      $cidades = $cidadecontroller->listarFormat();

      $_REQUEST['viagens'] = $viagens;
      $_REQUEST['cidades'] = $cidades;

      require_once 'view/Viagem.php';
   }
}

?>