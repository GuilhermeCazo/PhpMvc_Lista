<?php

namespace App\DAO;

use App\Model\LoginModel;
use \PDO;

class loginDAO extends DAO
{

    public function __construct()
    {
        parent::__construct();
    }



    public function selectByEmalAndSenha($email, $senha)
    {

    $sql = "SELECT * FROM usuarios WHERE email = ? and senha = sha1(?)";

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(1, $email);
    $stmt->bindValue(2, $senha);
    $stmt->execute();

    return $stmt->fetchObject("App\Model\LoginModel");

    }

}