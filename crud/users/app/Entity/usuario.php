<?php 
namespace app\Entity;

use App\db\dataBase;

class Usuario{

    Public $id;
    Public $tipo_user;
    Public $nome;
    Public $cpf;
    Public $senha;
    Public $email;
    Public $decricao;
    Public $data_nascimento;

    public function cadastrar(){
        $dataBase = new dataBase('tb_users');
        echo "<pre>"; print_r($dataBase); echo"</pre>";exit;
    }

}