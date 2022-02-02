<?php
    namespace App\db;
    use \PDO;
use PDOException;

class dataBase{

        const HOST ='localhost:3306';
        const NAME ='bd_teste';
        const USER ='root';
        const PASS ='password';

        private $table;
        private $connection;

        public function __construct($table = null)
        {
            $this->table = $table;
            $this->setConnection();
        }

        private function setConnection(){
            try {
               $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
               $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('ERROR: '.$e->getMessage());
            }
        }

    }