<?php

namespace app\Entity;

/* Dependências */

use App\db\dataBase;
use \PDOException;
use \PDO;

class Publicacao
{

    public $id_publicacao;
    public $tipo_publicacao;
    public $titulo;
    public $descricao;
    public $id_autor;
    public $estado;
    public $cidade;
    public $data_publicacao;

    public function cadastrar()
    {
        // Registra a data na qual a publicação foi feita
        $this->data_publicacao = date('Y-m-d H:i:s');

        // Pega as informações da variavel Usuario que chamou a Função e chama a função do banco de dados que 
        //insere esses dados e os guardad no banco
        $dataBase = new dataBase('tb_publicacao');
        $this->id_publicacao = $dataBase->insert([
            'tipo_publicacao' => $this->tipo_publicacao,
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'id_autor' => $this->id_autor,
            'estado' => $this->estado,
            'cidade' => $this->cidade,
            'data_publicacao' => $this->data_publicacao
        ]);
        return true;
    }

    public function atualizar()
    {

        // Pega as informações da variavel Usuario que chamou a Função e chama a função do banco de dados que 
        //então atualiza as informações pela nova
        return (new dataBase('tb_publicacao'))->updatePublicacao($this->id_publicacao, [
            'tipo_publicacao' => $this->tipo_publicacao,
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'estado' => $this->estado,
            'cidade' => $this->cidade,
            'data_publicacao' => $this->data_publicacao
        ]);
    }
    //Função que passa qual publicação deve ser excluida 
    public function excluir()
    {
        return (new dataBase('tb_publicacao'))->deletePublicacao($this->id_publicacao);
    }

    //Função chama todas a publicações 
    public static function getPublicacoes($where = null, $order = null, $limit = null)
    {
        return (new dataBase('tb_publicacao'))->selectPublicacao($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    //Função chama uma unica publicação com base no Id passado
    public static function getPublicacao($id_publicacao)
    {
        return (new dataBase('tb_publicacao'))->selectOnePublicacao('id_publicacao = ' . $id_publicacao)
            ->fetchObject(self::class);
    }

    //Função que chama todas as publicações feitas por um determinado usuario
    public static function getPublicacaoUser($id_user)
    {
        return (new dataBase('tb_publicacao'))->selectPublicacaoUser('id_autor = ' . $id_user)
        ->fetchAll(PDO::FETCH_CLASS, self::class);
    
    }

}
