<?php 

namespace app\Entity;

/* Dependências */

use App\db\dataBase;
use \PDOException;
use \PDO;

class Denuncia{
    public $id_denuncia;
    public $descricao_denuncia;
    public $id_autorDenuncia;
    public $status;
    public $data_denuncia;
    public $id_publicacaoDenunciada;

    public function cadastrar()
    {
        // Registra a data na qual a denuncia foi feita
        $this->data_denuncia = date('Y-m-d H:i:s');

        // Pega as informações da variavel Usuario que chamou a Função e chama a função do banco de dados que 
        //insere esses dados e os guardad no banco
        $dataBase = new dataBase('tb_denuncia');
        $this->id_denuncia = $dataBase->insertDenuncia([
            'descricao_denuncia' => $this->descricao_denuncia,
            'id_autorDenuncia' => $this->id_autorDenuncia,
            'data_denuncia' => $this->data_denuncia,
            'id_publicacaoDenunciada' => $this->id_publicacaoDenunciada
        ]);
        return true;
    }

    //Chama a função do banco de dados que desativa a Denuncia passando o ID de qual denuncia deve ser desativada
    public function desativar()
    {
        return (new dataBase('tb_denuncia'))->desativar($this->id_denuncia);
    }

    //Função que chama todas as denuncias
    public static function getDenuncias($where = null, $order = null, $limit = null)
    {
        return (new dataBase('tb_denuncia'))->selectDenuncias($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    //Função chama uma unica denuncia com base no Id passado
    public static function getDenuncia($id_denuncia)
    {
        return (new dataBase('tb_denuncia'))->selectOneDenuncia('id_denuncia = ' . $id_denuncia)
            ->fetchObject(self::class);
    }
}