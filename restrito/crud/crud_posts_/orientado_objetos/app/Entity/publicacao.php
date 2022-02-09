<?php 
namespace app\Entity;

use App\db\dataBase;
use \PDOException;
use \PDO;

class Publicacao{

    Public $id_publicacao;
    Public $tipo_publicacao;
    Public $titulo;
    Public $descricao;
    Public $estado;
    Public $cidade;
    Public $data_publicacao;

    public function cadastrar(){
        $dataBase = new dataBase('tb_publicacao');
        $this->id_publicacao = $dataBase->insert([
            'tipo_publicacao' => $this->tipo_publicacao,
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'estado' => $this->estado,
            'cidade' => $this->cidade,
            'data_publicacao' => $this->data_publicacao
        ]);
        return true;
    }

    public function atualizar(){
        return (new dataBase('tb_publicacao'))->updatePublicacao($this->id_publicacao,[
            'tipo_publicacao' => $this->tipo_publicacao,
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'estado' => $this->estado,
            'cidade' => $this->cidade,
            'data_publicacao' => $this->data_publicacao]);
    }

    public function excluir(){
        return (new dataBase('tb_publicacao'))->deletePublicacao($this->id_publicacao);
    }

    public static function getPublicacoes($where = null, $order = null, $limit=null){
        return (new dataBase('tb_publicacao'))->selectPublicacao($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getPublicacao($id_publicacao){
        return (new dataBase('tb_publicacao'))->selectOnePublicacao('id_publicacao = '.$id_publicacao)
                                        ->fetchObject(self::class);
    }

}