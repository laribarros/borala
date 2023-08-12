<?php
require_once 'model/Cidade.php';
 
class CidadeController {
   public function listarFormat() {
      $cidade = new Cidade();
      $cidades = $cidade->listAll();

      $cidade_json = "[";

      $i=0;
      foreach ($cidades as $c) {
         $cidade_json .= '{value: "'.$c->getId().'", label: "'.$c->getNome().' - '.$c->getEstado()->getUf().'"}';

         if($i < sizeof($cidades)) {
            $cidade_json .= ', ';
         }

         $i++;
      }

      $cidade_json .= ']';

      return $cidade_json;
   }
}

?>