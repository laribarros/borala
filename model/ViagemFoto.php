<?php
require_once 'lib/conexao.php';

class ViagemFoto {
  private $id;
  private $nome_arquivo;
  private $viagem;

  public function setViagem($viagem) {
    $this->viagem = $viagem;
  }

  public function getId() {
    return $this->id;
  }

  public function getNomeArquivo() {
    return $this->nome_arquivo;
  }
   
  public function getOneByViagem() {
    $DB = Conexao::getInstance();
    $res = $DB->query("select * from viagem_foto where viagem=".$this->viagem." order by rand() limit 1");
    $res->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ViagemFoto');
    $obj = $res->fetch();

    return $obj;
  }
   
}

?>