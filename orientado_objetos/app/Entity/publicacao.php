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
    public $estado;
    public $cidade;
    public $data_publicacao;

    public function cadastrar()
    {
        // DEFINIR A DATA DE PUBLICAÇÃO DA VAGADA
        $this->data_publicacao = date('Y-m-d H:i:s');

        // INSTANCIA A CLASSE dataBase, conexão criada e tabela selecionada(passada por parâmetro) pelo construtor!
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

    public function atualizar()
    {
        return (new dataBase('tb_publicacao'))->updatePublicacao($this->id_publicacao, [
            'tipo_publicacao' => $this->tipo_publicacao,
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'estado' => $this->estado,
            'cidade' => $this->cidade,
            'data_publicacao' => $this->data_publicacao
        ]);
    }

    public function excluir()
    {
        return (new dataBase('tb_publicacao'))->deletePublicacao($this->id_publicacao);
    }

    public static function getPublicacoes($where = null, $order = null, $limit = null)
    {
        return (new dataBase('tb_publicacao'))->selectPublicacao($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getPublicacao($id_publicacao)
    {
        return (new dataBase('tb_publicacao'))->selectOnePublicacao('id_publicacao = ' . $id_publicacao)
            ->fetchObject(self::class);
    }
}
