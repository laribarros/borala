<?php
require_once 'lib/conexao.php';

class ViagemPacote {
  private $id;
  private $titulo;
  private $descricao;
  private $valor;
  private $quantidade_disponivel;
  private $bloqueado;
  private $viagem;
  private $contrato;

  public function setViagem($viagem) {
    $this->viagem = $viagem;
  }

  public function getId() {
    return $this->id;
  }

  public function getTitulo() {
    return $this->titulo;
  }

  public function getDescricao() {
    return $this->descricao;
  }

  public function getValor() {
    return $this->valor;
  }

  public function getQuantidadeDisponivel() {
    return $this->quantidade_disponivel;
  }

  public function getBloqueado() {
    return $this->bloqueado;
  }

  public function getViagem() {
    return $this->viagem;
  }

  public function getContrato() {
    return $this->contrato;
  }
   
  public function getByViagem() {
    $DB = Conexao::getInstance();
    $res = $DB->query("select * from viagem_pacote where bloqueado=0 and quantidade_disponivel>0 and viagem=".$this->viagem)->fetchAll(PDO::FETCH_CLASS, 'ViagemPacote');

    return $res;
  }
   
}

?>