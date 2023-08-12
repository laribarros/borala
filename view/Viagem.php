<?php
  $viagens = $_REQUEST['viagens'];
  $cidades = $_REQUEST['cidades'];

  $partida_value = isset($_POST['partida_value'])?$_POST['partida_value']:'';
  $destino_value = isset($_POST['destino_value'])?$_POST['destino_value']:'';
  $partida = isset($_POST['partida'])?$_POST['partida']:'';
  $destino = isset($_POST['destino'])?$_POST['destino']:'';
  $ida = isset($_POST['ida'])?$_POST['ida']:'';
  $volta = isset($_POST['volta'])?$_POST['volta']:'';
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

    <meta name="author" content="Larissa Barros" />
    <meta name="description" content="Empodere-se, viaje pelo mundo!"/>
    <meta name="resource-type" content="document"/>
    <meta name="robots" content="INDEX, FOLLOW"/>
    <meta name="content-language" content="pt-br"/>
    <meta name="revisit" content="1 day"/>
    <meta name="DC.title" content="Bora Lá"/>
    <meta name="keywords" content="pacote viagens, viagem">
    <meta name="theme-color" content="#142A9C">
    <meta name="msapplication-TileColor" content="#142A9C">
    <meta name="msapplication-navbutton-color" content="#142A9C">
    <meta name="apple-mobile-web-app-status-bar-style" content="#142A9C">

    <!-- Metas do Facebook -->
        <meta property="og:locale" content="pt_BR">
        <meta property="og:site_name" content="Bora Lá">
        <meta property="og:title" content="Bora Lá>"/>
        <meta property="og:description" content="Empodere-se, viaje pelo mundo!"/>
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="1080">
        <meta property="og:image:height" content="1080">
        <meta property="og:url" content=""/>
        <meta property="og:type" content="website">
        <meta property="og:image" content="imgs/logo_campanha.jpg"/>
    <!-- Fim Metas do Facebook -->

    <title>Bora Lá</title>

    <meta property="fb:app_id" content="910510308980330"/>
    <link rel="icon" href="imgs/favicon.png">

    <link href="js_css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="js_css/code.jquery.com_ui_1.13.2_themes_base_jquery-ui.css" rel="stylesheet">
    <link href="js_css/estilo.css" rel="stylesheet">
  
    <script src="js_css/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js_css/code.jquery.com_jquery-3.7.0.min.js" crossorigin="anonymous"></script>
    <script src="js_css/code.jquery.com_ui_1.13.2_jquery-ui.js" crossorigin="anonymous"></script>
    <script src="js_css/maskedinput.js"></script>

  </head>
  <body>
    <header>
      <div class="fundo"></div>
      <div class="container">
          <div class="row menu">
              <div class="col-12">
                  <div class="row">
                      <div class="col-md-2 col-8 logo">
                          <img src="imgs/logo.svg">
                      </div>
                      <div class="col-md-10 links">
                        <ul>
                          <li>
                              <a href="#">Início</a>
                          </li>
                          <li>
                              <a href="#">Sobre</a>
                          </li>
                          <li>
                              <a href="#">Minhas passagens</a>
                          </li>
                          <li>
                              <a href="#">Administre sua conta</a>
                          </li>
                          <li>
                              <a href="#">Contato</a>
                          </li>
                          <li class="mobile login">
                              <a href="#">Realizar login</a>
                          </li>
                          <li class="mobile agente">
                              <a href="#">É um agente de viagens? <b>Cadastre-se</b></a>
                          </li>
                        </ul>
                      </div>
                  </div>
              </div>
          </div>

          <div class="cont-menu">
              <div class="abre_menu" title="Abrir Menu"><span></span></div>
          </div>
      </div>
    </header>

    <section id="busca">
      <div class="fundo"></div>
      <div class="container">
        <form method="post">
          <input type="hidden" name="partida_value" id="partida_value" value="<?=$partida_value?>" />
          <input type="hidden" name="destino_value" id="destino_value" value="<?=$destino_value?>" />

          <div class="row">

            <div class="col-md-3">
              <input type="text" name="partida" id="partida" placeholder="Partida" class="form-control" value="<?=$partida?>" required />
            </div>
            <div class="col-md-3">
              <input type="text" name="destino" id="destino" placeholder="Destino" class="form-control" value="<?=$destino?>" required />
            </div>

            <div class="col-md-2 col-6">
              <input type="tel" name="ida" placeholder="Ida" class="form-control data" value="<?=$ida?>" maxlength="10" required />
            </div>
            <div class="col-md-2 col-6">
              <input type="tel" name="volta" placeholder="Volta" class="form-control data" value="<?=$volta?>" maxlength="10" required />
            </div>

            <div class="col-md-2">
              <button type="submit" class="desktop-xs">BUSCAR</button>
              <button type="submit" class="mobile-xs">BUSCAR PACOTE DOS SONHOS</button>
            </div>

          </div>
        </form>
      </div>
    </section>

    <div class="container">
      
      <section id="empoderese">
        <?php if(!isset($_POST['partida'])) { ?>
          <div class="row">
            <div class="col-6">
              <img src="imgs/empoderese.png" alt="Empodere-se" title="Empodere-se" />
            </div>

            <div class="col-6 alinha">
              <p class="destaque">EMPODERE-SE</p>
              <p>viaje para o mundo</p>
            </div>
          </div>
        <?php } ?>
      </section>
      
      <section id="viagens">

        <?php if(sizeof($viagens)==0) { ?>
          <p class="center">Nenhuma viagem encontrada!</p>
        <?php } else {
          foreach ($viagens as $v) { ?>
          <div class="viagem">
            <a href="#">
              <img src="viagens/<?=$v->getViagemFoto()->getNomeArquivo()?>" alt="" title="" />
              <p class="nome"><?=$v->getTitulo()?></p>
              <p class="por">Por <?=$v->getAgente()->getRazaoSocial()?></p>
              <p class="partindo">Partindo de <?=$v->getCidadeOrigem()->getNome()?> - <?=$v->getCidadeOrigem()->getEstado()->getUf()?></p>
              <p class="horario">Saída <?=$v->getDataPartida()?> | Volta <?=$v->getDataRetorno()?> </p>
            </a>

            <div class="container">
              <div class="row">
                
                <div class="col-md-10 col-8">
                  <a href="#" class="resta">
                    Só restam <?=$v->getQuantidadeRestante()?> passagens!
                  </a>
                </div>

                <div class="col-md-2 col-4">
                  <a href="#">
                    <p class="apartir">A partir de</p>
                    <p class="valor">R$ <?=$v->getMenorValor()?></p>
                    <p class="apartir">em até 12x</p>
                  </a>
                </div>

              </div>
            </div>
          </div>
        <?php } 
      }?>
        
      </section>

      <footer>
        <p>
          Copyright © <?=date("Y")?> Bora Lá
        </p>
      </footer>
    </div>
  </body>

  <script language="javascript" type="text/javascript">    
    $(document).ready(function(){
      $('.abre_menu').click(function(){
          $('header ul').toggleClass('aberto');
          $('body').toggleClass('menu_aberto');
          return false;
      });

      $('.data').focusout(function(){
          var element;
          element = $(this);
          element.unmask();
          element.mask("99/99/9999");
      }).trigger('focusout');


      var cidades = <?=$cidades?>;

      $('#partida').autocomplete({
        source: cidades,
        focus: function( event, ui ) {
          event.preventDefault();
          $('#partida').val(ui.item.label);
          $('#partida_value').val(ui.item.value);
        },
        select: function( event, ui ) {
          event.preventDefault();
          $('#partida').val(ui.item.label);
          $('#partida_value').val(ui.item.value);
        }
      });

      $('#destino').autocomplete({
        source: cidades,
        focus: function( event, ui ) {
          event.preventDefault();
          $('#destino').val(ui.item.label);
          $('#destino_value').val(ui.item.value);
        },
        select: function( event, ui ) {
          event.preventDefault();
          $('#destino').val(ui.item.label);
          $('#destino_value').val(ui.item.value);
        }
      });

    });
</script>
</html>