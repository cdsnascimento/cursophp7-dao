<?php

    class Sql extends PDO {

        /*Método construtor do banco de dados*/
        public function __construct(){}
        
        /*Evita que a classe seja clonada*/
        private function __clone(){}
        
        /*Método que destroi a conexão com banco de dados e remove da memória todas as variáveis setadas*/
        public function __destruct() {
            $this->disconnect();
            foreach ($this as $key => $value) {
                unset($this->$key);
            }
        }
        
        private static $dbtype   = "mysql";
        private static $host     = "localhost";
        private static $port     = "3306";
        private static $user     = "root";
        private static $password = "";
        private static $db       = "dbphp7";
        private $conn;
        
        /*Metodos que trazem o conteudo da variavel desejada
        @return   $xxx = conteudo da variavel solicitada*/
        private function getDBType()  {return self::$dbtype;}
        private function getHost()    {return self::$host;}
        private function getPort()    {return self::$port;}
        private function getUser()    {return self::$user;}
        private function getPassword(){return self::$password;}
        private function getDB()      {return self::$db;}

        private function connect(){
            try
            {
                $this->conn = new PDO($this->getDBType().":host=".$this->getHost().";dbname=".$this->getDB(), $this->getUser(), $this->getPassword());

            }
            catch (PDOException $i)
            {
                //se houver exceção, exibe
                die("Erro: <code>" . $i->getMessage() . "</code>");
            }
             
            return ($this->conn);
        }
         
        private function disconnect(){
            $this->conn = null;
        }

        // private $conn;

        // public function __construct(){

        //     $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root","");

        // }

        private function setParams($statment, $parameters = array()){

            foreach ($parameters as $key => $value) {

                $this->setParam($statment, $key, $value);

            }

        }

        private function setParam($statment, $key, $value) {

            $statment->bindParam($key, $value);

        }

        public function query($rawQuery, $params = array()){
           
            $stmt = $this->connect()->prepare($rawQuery);

            $this->setParams($stmt, $params);

            $stmt->execute();

            return $stmt;

        }

        public function select($rawQuery, $params = array()):array{

            $stmt = $this->query($rawQuery, $params);

             return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

    }

?>