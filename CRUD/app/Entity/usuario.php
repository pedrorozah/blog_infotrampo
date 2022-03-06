<?php 
namespace app\Entity;

use App\db\dataBase;
use \PDOException;
use \PDO;

class Usuario{

    Public $id;
    Public $tipo_user;
    Public $nome;
    Public $cpf;
    Public $senha;
    Public $email;
    Public $descricao;
    Public $data_nascimento;

    public function cadastrar(){
        $dataBase = new dataBase('tb_users');
        $this->id = $dataBase->insert([
            'tipo_user' => $this->tipo_user,
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'senha' => $this->senha,
            'email' => $this->email,
            'descricao' => $this->descricao,
            'data_nascimento' => $this->data_nascimento
        ]);
        return true;
    }

    public function atualizar(){
        return (new dataBase('tb_users'))->update($this->id,[
            'tipo_user' => $this->tipo_user,
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'senha' => $this->senha,
            'email' => $this->email,
            'descricao' => $this->descricao,
            'data_nascimento' => $this->data_nascimento]);

    }

    public function excluir(){
        return (new dataBase('tb_users'))->delete($this->id);
    }

    public static function getUsers($where = null, $order = null, $limit=null){
        return (new dataBase('tb_users'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getUser($id){
        return (new dataBase('tb_users'))->selectOne('id = '.$id)
                                        ->fetchObject(self::class);
    }

    public static function getLogin($email){
        return (new dataBase('tb_users'))->selectLogin($email)
                                        ->fetchObject(self::class);
    }

}