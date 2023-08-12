<?php
require_once 'lib/conexao.php';

class Estado {
  private $id;
  private $nome;
  private $uf;

  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function getNome() {
    return $this->nome;
  }

  public function getUf() {
    return $this->uf;
  }

  public function getById() {
    $DB = Conexao::getInstance();
    $res = $DB->query("select * from estado where id=".$this->id);
    $res->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Estado');
    $obj = $res->fetch();

    return $obj;
  }
   
}

?>