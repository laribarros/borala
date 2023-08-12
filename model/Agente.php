<?php
require_once 'lib/conexao.php';

class Agente {
  private $id;
  private $cnpj_cpf;
  private $nome;
  private $razao_social;
  private $telefone;
  private $email;
  private $site;
  private $bloqueado;
  private $endereco;

  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function getCnpjCpf() {
    return $this->cnpj_cpf;
  }

  public function getNome() {
    return $this->nome;
  }

  public function getRazaoSocial() {
    return $this->razao_social;
  }

  public function getTelefone() {
    return $this->telefone;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getSite() {
    return $this->site;
  }

  public function getBloqueado() {
    return $this->bloqueado;
  }

  public function getEndereco() {
    return $this->endereco;
  }
   
  public function getById() {
    $DB = Conexao::getInstance();
    $res = $DB->query("select * from agente where bloqueado=0 and id=".$this->id);
    $res->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Agente');
    $obj = $res->fetch();

    return $obj;
  }
   
}

?>