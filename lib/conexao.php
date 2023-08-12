<?php
if(!class_exists('Conexao')) {

    //BANCO DE DADOS
    /*DEFINE('BANCO', 'localhost'); 
    DEFINE('DATA_BASE', 'borala');
    DEFINE('USUARIO', 'root');
    DEFINE('SENHA', '');*/

    DEFINE('BANCO', 'borala-do-user-14507995-0.b.db.ondigitalocean.com'); 
    DEFINE('DATA_BASE', 'borala');
    DEFINE('USUARIO', 'doadmin');
    DEFINE('SENHA', 'AVNS_0NhZB_mZTjyUjasTOTx');
    DEFINE('PORTA', '25060');

    class Conexao extends PDO {
        private static $instancia;
     
        public function Conexao($dsn, $username = "", $password = "") {
            // O construtro abaixo � o do PDO
            parent::__construct($dsn, $username, $password);
        }
     
        public static function getInstance() {
            if(!isset( self::$instancia )) {
                try {
                    self::$instancia = new Conexao("mysql:host=".BANCO.":".PORTA.";dbname=".DATA_BASE, USUARIO , SENHA, array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true ));
                } catch ( Exception $e ) {
                    echo 'Erro ao conectar'.$e->getMessage();
                    exit ();
                }
            }
            return self::$instancia;
        }
    }

    $DB = Conexao::getInstance();
    $a = $DB->query("SET NAMES utf8;SET character_set_connection=utf8;SET character_set_client=utf8;SET character_set_results=utf8;SET time_zone='-3:00';");
    $a->closeCursor();

    date_default_timezone_set('America/Sao_paulo');
    setlocale(LC_ALL, "pt_BR");
}
?>