<?php
require_once 'lib/conexao.php';
require_once 'Estado.php';

class Cidade {
  private $id;
  private $nome;
  private $estado;
  private $objestado;

  public function setEstado() {
    $objestado = new Estado();

    $objestado->setId($this->estado);

    $this->objestado = $objestado->getById();
  }

  public function getEstado() {
    $this->setEstado();
    return $this->objestado;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function getNome() {
    return $this->nome;
  }

  public function getIdEstado() {
    return $this->estado;
  }

  public function listAll() {
    $DB = Conexao::getInstance();
    $res = $DB->query("select * from cidade")->fetchAll(PDO::FETCH_CLASS, 'Cidade');

    return $res;
  }

  public function getById() {
    $DB = Conexao::getInstance();
    $res = $DB->query("select * from cidade where id=".$this->id);
    $res->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Cidade');
    $obj = $res->fetch();

    return $obj;
  }
   
}

?>