<?php

namespace App\DAO;

use App\Model\ProdutoModel;
use \PDO;


/** A criação da Classe DAO, feita para acionar 
 * os comandos responsáveis para acessar o banco de dade */
class ProdutoDAO extends DAO
{
   
    public function __construct()
    {
        parent::__construct();
    }
/** Método responsável por inserir um novo arquivo no BD utilizando o método INSERT
 * ele vai ser instânciado na Model para depois ser intanciado aqui.
 */
    public function insert(ProdutoModel $model)
    {

      /** Comando que será utilizado no MySQL para inserir */
        $sql = "INSERT INTO produto (descricao, id_categoria, preco_venda, preco_compra) VALUES (?, ?, ?, ?) ";
       
       
        $stmt = $this->conexao->prepare($sql);

        /** É dada a localização no código do Insert, em qual dos valores "escondidos"
         * estão localizados cada campo da tabela de BD 
        */
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->id_categoria);
        $stmt->bindValue(3, $model->preco_venda);
        $stmt->bindValue(4, $model->preco_compra);

        $stmt->execute();
    }


   /** Método responsável por atualiza um arquivo ja existente no BD utilizando o método INSERT
 * ele vai ser instânciado na Model para depois ser intanciado aqui.
 */
    public function update(ProdutoModel $model)
    {
         /** Comando que será utilizado no MySQL para atualizar */
        $sql = "UPDATE produto SET descricao=?, id_categoria=?, preco_venda=?, preco_compra=? WHERE id=? ";

        /** É dada a localização no código do Insert, em qual dos valores "escondidos"
         * estão localizados cada campo da tabela de BD 
        */
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->id_categoria);
        $stmt->bindValue(3, $model->preco_venda);
        $stmt->bindValue(4, $model->preco_compra);

        $stmt->bindValue(5, $model->id);
        $stmt->execute();
    }

/** Método responsável por selecionar e mostrar os campos e componentes de um arquivo ja existente no BD utilizando o método INSERT
 * ele vai ser instânciado na Model para depois ser intanciado aqui.
 */
    public function select()
    {
        /** Comando que será utilizado no MySQL para selecionar e mostrar cada item de cada campo*/
        $sql = "SELECT * FROM produto ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


   /** Aqui é para retornonar um registro específico da tabela 
        */
    public function selectById(int $id)
    {
        //include_once 'Model/ProdutoModel.php';

        $sql = "SELECT * FROM Produto WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\ProdutoModel"); 


    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM Produto WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}