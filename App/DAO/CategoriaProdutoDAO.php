<?php

namespace App\DAO;

use App\Model\CategoriaProdutoModel;
use \PDO;

class CategoriaProdutoDAO extends DAO
{
   
    public function __construct()
    {
        parent::__construct();
    }



    public function insert(CategoriaProdutoModel $model)
    {
      
        $sql = "INSERT INTO CategoriaProduto (nome) VALUES (?) ";
       
        $stmt = $this->conexao->prepare($sql);


        $stmt->bindValue(1, $model->nome);
    

        $stmt->execute();
    }



    public function update(CategoriaProdutoModel $model)
    {
        $sql = "UPDATE CategoriaProduto SET nome=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->id);
        $stmt->execute();
    }



    public function select()
    {
        $sql = "SELECT * FROM CategoriaProduto ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


   
    public function selectById(int $id)
    {
        //include_once 'Model/CategoriaProdutoModel.php';

        $sql = "SELECT * FROM CategoriaProduto WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\CategoriaProdutoModel"); 


    }


    
    public function delete(int $id)
    {
        $sql = "DELETE FROM CategoriaProduto WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}