<?php

namespace App\db;

/* Dependências */

use \PDO;
use PDOException;

class dataBase
{

    /* Dados de acesso do banco de dados */
    const HOST = 'localhost:3306';
    const NAME = 'bd_teste';
    const USER = 'root';
    const PASS = 'bancodedados';

    private $table;
    private $connection;


    /* Construtor dataBase */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /* Método responsável por criar uma conexão com o banco de dados */
    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // MUDAR ESSE COMANDO PARA EXIBIR UMA MENSAGEM PARA O USUÁRIO, esse die exibe uma mensagem explicativa sobre o erro que ocorreu durante a conexão com o banco!
            die('ERROR: ' . $e->getMessage());
        }
    }


    public function execute($query, $params = [])
    {
        try {
            $statemente = $this->connection->prepare($query);
            $statemente->execute($params);
            return $statemente;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    // Funções USUÁRIO
    public function insert($values)
    {
        // DADOS DA QUERY, métodos array_key e array_pad
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        // MONTA A QUERY
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ' ) VALUES (' . implode(',', $binds) . ')';
        $this->execute($query, array_values($values));
        return $this->connection->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        $where = strlen($where) ? 'WHERE' . $where : '';
        $order = strlen($order) ? 'ORDER BY' . $order : '';
        $limit = strlen($limit) ? 'LIMIT' . $limit : '';

        $query = 'SELECT ' . $fields . ' FROM tb_users ' . $where . ' ' . $order . ' ' . $limit;
        return $this->execute($query);
    }

    public function selectOne($id)
    {

        $query = 'SELECT * FROM tb_users WHERE ' . $id;
        return $this->execute($query);
    }

    public function selectLogin($email){
        //SELECT * FROM tb_users WHERE email = "como" and senha = "consagrado"
$query = 'SELECT * FROM tb_users WHERE email = "'.$email.'"';
//echo("seu pai");
//print_r($query);
return $this->execute($query);


}

    public function update($where, $values)
    {
        $fields = array_keys($values);
        $query = 'UPDATE tb_users SET ' . implode('=?,', $fields) . '=? WHERE id = ' . $where;
        $this->execute($query, array_values($values));
        return true;
    }

    public function delete($where)
    {
        $query = 'DELETE FROM tb_users WHERE id = ' . $where;
        $this->execute($query);
        return true;
    }

    // Funções PUBLICAÇÃO

    // Trocar nome do banco de dados para ser igual do LUIZ e da tabela PUBLICACAO para tb_publicacao (FEITO); 
    public function selectPublicacao($where = null, $order = null, $limit = null, $fields = '*')
    {
        $where = strlen($where) ? 'WHERE' . $where : '';
        $order = strlen($order) ? 'ORDER BY' . $order : '';
        $limit = strlen($limit) ? 'LIMIT' . $limit : '';
        $query = 'SELECT ' . $fields . ' FROM tb_publicacao ' . $where . ' ' . $order . ' ' . $limit;
        return $this->execute($query);
    }

    public function selectOnePublicacao($id_publicacao)
    {
        $query = 'SELECT * FROM tb_publicacao WHERE ' . $id_publicacao;
        return $this->execute($query);
    }

    public function updatePublicacao($where, $values)
    {
        $fields = array_keys($values);
        $query = 'UPDATE tb_publicacao SET ' . implode('=?,', $fields) . '=? WHERE id_publicacao = ' . $where;
        $this->execute($query, array_values($values));
        return true;
    }

    public function deletePublicacao($where)
    {
        $query = 'DELETE FROM tb_publicacao WHERE id_publicacao = ' . $where;
        $this->execute($query);
        return true;
    }
}
