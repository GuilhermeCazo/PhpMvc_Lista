<?php

namespace App\Model;

use App\DAO\loginDAO;


class LoginModel extends Model
{

    public $id, $nome, $email, $senha;



    public function autenticar()
    {
        $dao = new loginDAO();

        $dados_usuario_logado = $dao->selectByEmalAndSenha($this->email, $this->senha);

        if(is_object($dados_usuario_logado))
            return $dados_usuario_logado;
        else   
        
        null;

    }

}