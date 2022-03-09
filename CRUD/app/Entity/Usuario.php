<?php 

namespace app\Entity;

use App\db\dataBase;
use \PDOException;
use \PDO;

class Usuario
{

    Public $id;
    Public $tipo_user;
    Public $nome;
    Public $cpf;
    Public $senha;
    Public $email;
    Public $descricao;
    Public $data_nascimento;

    //Função que pega as informações da variavel que a chamou e passa esses dados para serem inseridos no banco de dados
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

    //Função que pega as nova informações da variavel que a chamou e passa esses dados para serem atualizados no banco de dados
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

    //Função que pega o ID de quem deve ser excluido e manda para o banco de dados para ser excluido
    public function excluir(){
        return (new dataBase('tb_users'))->delete($this->id);
    }

    //Função que manda o banco de dados trazer a informação de todas as publicações
    public static function getUsers($where = null, $order = null, $limit=null){
        return (new dataBase('tb_users'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    //Função que manda o banco de dados trazer a informação de uma publicação em especifico
    public static function getUser($id){
        return (new dataBase('tb_users'))->selectOne('id = '.$id)
                                        ->fetchObject(self::class);
    }

    //Função que manda o banco conferir se as informações passasdas no Login corresponde as informações que existem no banco
    public static function getLogin($email){
        return (new dataBase('tb_users'))->selectLogin($email)
                                        ->fetchObject(self::class);
    }

}