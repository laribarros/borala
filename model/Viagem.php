<?php
require_once 'lib/conexao.php';
require_once 'ViagemFoto.php';
require_once 'Agente.php';
require_once 'Cidade.php';

class Viagem {
  private $id;
  private $titulo;
  private $descricao;
  private $data_partida;
  private $data_retorno;
  private $data_cadastro;
  private $data_limite_venda;
  private $bloqueado;
  private $cidade_origem;
  private $cidade_destino;
  private $agente;
  private $viagemfoto;
  private $objagente;
  private $objcidadeorigem;

  public function setViagemFoto() {
    $viagemfoto = new ViagemFoto();

    $viagemfoto->setViagem($this->id);

    $this->viagemfoto = $viagemfoto->getOneByViagem();
  }

  public function getViagemFoto() {
    $this->setViagemFoto();
    return $this->viagemfoto;
  }

  public function setAgente() {
    $objagente = new Agente();

    $objagente->setId($this->agente);

    $this->objagente = $objagente->getById();
  }

  public function getAgente() {
    $this->setAgente();
    return $this->objagente;
  }

  public function setCidadeOrigem() {
    $objcidadeorigem = new Cidade();

    $objcidadeorigem->setId($this->cidade_origem);

    $this->objcidadeorigem = $objcidadeorigem->getById();
  }

  public function getCidadeOrigem() {
    $this->setCidadeOrigem();
    return $this->objcidadeorigem;
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

  public function getDataPartida() {
    return $this->data_partida;
  }

  public function getDataRetorno() {
    return $this->data_retorno;
  }

  public function getDataCadastro() {
    return $this->data_cadastro;
  }

  public function getDataLimiteVenda() {
    return $this->data_limite_venda;
  }

  public function getBloqueado() {
    return $this->bloqueado;
  }

  public function getIdCidadeOrigem() {
    return $this->cidade_origem;
  }

  public function getIdCidadeDestino() {
    return $this->cidade_destino;
  }

  public function getIdAgente() {
    return $this->agente;
  }

  public function listBySearch($partida, $destino, $ida, $volta) {
    $DB = Conexao::getInstance();
    $res = $DB->query("select id, titulo, descricao, DATE_FORMAT(data_partida, '%d/%m/%Y %H:%i') as data_partida, DATE_FORMAT(data_retorno, '%d/%m/%Y %H:%i') as data_retorno, DATE_FORMAT(data_cadastro, '%d/%m/%Y %H:%i') as data_cadastro, DATE_FORMAT(data_limite_venda, '%d/%m/%Y') as data_limite_venda, bloqueado, cidade_origem, cidade_destino, agente from viagem where bloqueado=0 and data_limite_venda>=now() and (select sum(quantidade_disponivel) from viagem_pacote where viagem=viagem.id and bloqueado=0)>0 and cidade_origem=$partida and cidade_destino=$destino and DATE_FORMAT(data_partida, '%d/%m/%Y')='".$ida."' and DATE_FORMAT(data_retorno, '%d/%m/%Y')='".$volta."'")->fetchAll(PDO::FETCH_CLASS, 'Viagem');

    return $res;
  }
   
  public function listAll() {
    $DB = Conexao::getInstance();
    $res = $DB->query("select id, titulo, descricao, DATE_FORMAT(data_partida, '%d/%m/%Y %H:%i') as data_partida, DATE_FORMAT(data_retorno, '%d/%m/%Y %H:%i') as data_retorno, DATE_FORMAT(data_cadastro, '%d/%m/%Y %H:%i') as data_cadastro, DATE_FORMAT(data_limite_venda, '%d/%m/%Y') as data_limite_venda, bloqueado, cidade_origem, cidade_destino, agente from viagem where bloqueado=0 and data_limite_venda>=now() and (select sum(quantidade_disponivel) from viagem_pacote where viagem=viagem.id and bloqueado=0)>0")->fetchAll(PDO::FETCH_CLASS, 'Viagem');

    return $res;
  }

  public function getQuantidadeRestante() {
    $DB = Conexao::getInstance();
    $res = $DB->query("select sum(quantidade_disponivel) as total from viagem_pacote where bloqueado=0 and viagem=".$this->id)->fetchAll(PDO::FETCH_ASSOC);

    return $res[0]['total'];
  }

  public function getMenorValor() {
    $DB = Conexao::getInstance();
    $res = $DB->query("select min(valor) as valor from viagem_pacote where bloqueado=0 and quantidade_disponivel>0 and viagem=".$this->id)->fetchAll(PDO::FETCH_ASSOC);

    return $res[0]['valor'];
  }
   
}

?>