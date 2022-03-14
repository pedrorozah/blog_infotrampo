<?php
    namespace App\db;
    use \PDO;
use PDOException;

class dataBase{
        //Informações para conectar no banco de dados 
        const HOST ='localhost:3306';
        const NAME ='bd_infotrampo';
        const USER ='root';
        const PASS ='password';

        private $table;
        private $connection;

        public function __construct($table = null)
        {
            $this->table = $table;
            $this->setConnection();
        }

        //faz a conexão com o banco 
        private function setConnection(){
            try {
               $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
               $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('ERROR: '.$e->getMessage());
            }
        }
        //executa a querry passada dentro do banco de dados
        public function execute ($query,$params=[]) {
            try {
                $statemente = $this->connection->prepare($query);
                $statemente->execute($params);
                return $statemente;
            } catch (PDOException $e) {
                 die('ERROR: '.$e->getMessage());
             }

        }

        //Insere o registro de um usuario dentro do banco de dados
        public function insert($values){
            $fields = array_keys($values);
            $binds = array_pad([],count($fields),'?');

            $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).' ) VALUES ('.implode(',',$binds).')';
            $this->execute($query,array_values($values));
            return $this->connection->lastInsertId();
        }


        //Seleciona TODOS os registros da tabela que guarda os usuarios registrados no servidor
        public function select($where = null, $order = null, $limit=null, $fields = '*'){
            $where = strlen($where) ? 'WHERE'.$where : '';
            $order = strlen($order) ? 'ORDER BY'.$order : '';
            $limit = strlen($limit) ? 'LIMIT'.$limit : '';
            
            $query = 'SELECT '.$fields.' FROM tb_users '.$where.' '.$order.' '.$limit;
            return $this->execute($query);
        }

        //Selecionna UM registro da tabela usuario com base no ID passado na hora em que a função é chamada
        public function selectOne($id){

            $query = 'SELECT * FROM tb_users WHERE '.$id;
            return $this->execute($query);

            
        }

        //Seleciona as informações para confirmar se aquele Login existe e está correto
        public function selectLogin($email){
                    //SELECT * FROM tb_users WHERE email = "como" and senha = "consagrado"
            $query = 'SELECT * FROM tb_users WHERE email = "'.$email.'"';
            return $this->execute($query);

            
        }

        //Atualiza as informações no banco do Usuario pelas novas informaçoes passada
        public function update($where,$values){
            $fields = array_keys($values);
            $query = 'UPDATE tb_users SET '.implode('=?,',$fields).'=? WHERE id = '.$where;
            $this->execute($query,array_values($values));
            return true;
        }

        //Deleta o registro de um usuario e suas informações dentro do banco
        public function delete($where){
            $query = 'DELETE FROM tb_users WHERE id = '.$where;
            $this->execute($query);
            return true;
        }

// Funções PUBLICAÇÃO

     //Seleciona TODOS os registros da tabela que guarda as publicações registrados no servidor
    public function selectPublicacao($where = null, $order = null, $limit = null, $fields = '*')
    {
        $where = strlen($where) ? 'WHERE' . $where : '';
        $order = strlen($order) ? 'ORDER BY' . $order : '';
        $limit = strlen($limit) ? 'LIMIT' . $limit : '';
        $query = 'SELECT ' . $fields . ' FROM tb_publicacao ' . $where . ' ' . $order . ' ' . $limit;
        return $this->execute($query);
    }

    //Selecionna UM registro da tabela publicacao com base no ID passado na hora em que a função é chamada
    public function selectOnePublicacao($id_publicacao)
    {
        $query = 'SELECT * FROM tb_publicacao WHERE ' . $id_publicacao;
        return $this->execute($query);
    }

    //Seleciona todas as publicações feitas por um determinado usuario
    public function selectPublicacaoUser($id_autor){
        $query = 'SELECT * FROM tb_publicacao WHERE ' . $id_autor;
        return $this->execute($query);
    }

    //Atualiza as informações no banco da publicação pelas novas informaçoes passadas
    public function updatePublicacao($where, $values)
    {
        $fields = array_keys($values);
        $query = 'UPDATE tb_publicacao SET ' . implode('=?,', $fields) . '=? WHERE id_publicacao = ' . $where;
        $this->execute($query, array_values($values));
        return true;
    }

    //Deleta o registro de uma publicação e suas informações dentro do banco
    public function deletePublicacao($where)
    {
        $query = 'DELETE FROM tb_publicacao WHERE id_publicacao = ' . $where;
        $this->execute($query);
        return true;
    }

// Funções Denuncia


    //Insere uma denuncia cadastrada dentro do banco de dados
    public function insertDenuncia($values){
        $fields = array_keys($values);
        $binds = array_pad([],count($fields),'?');

        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).' ) VALUES ('.implode(',',$binds).')';
        $this->execute($query,array_values($values));
        return $this->connection->lastInsertId();
    }

    //Traz o registro de todas as denuncias armazenadas no banco de dados
    public function selectDenuncias($where = null, $order = null, $limit = null, $fields = '*')
    {
        $where = strlen($where) ? 'WHERE' . $where : '';
        $order = strlen($order) ? 'ORDER BY' . $order : '';
        $limit = strlen($limit) ? 'LIMIT' . $limit : '';
        $query = 'SELECT ' . $fields . ' FROM tb_denuncia ' . $where . ' ' . $order . ' ' . $limit;
        return $this->execute($query);
    }

    //Seleciona UMA unica denuncia do banco de dados de acordo com o ID passado na hora de chamar a denuncia
    public function selectOneDenuncia($id_denuncia)
    {
        $query = 'SELECT * FROM tb_denuncia WHERE ' . $id_denuncia;
        return $this->execute($query);
    }

    //"Desativa" uma denuncia alterando a no banco de dados
    public function desativar($where){
        $inativo="'inativo'";
        $query = 'UPDATE tb_denuncia SET `status` = '.$inativo.' WHERE id_denuncia = ' . $where;
        $this->execute($query);
        return true;
    }

    }