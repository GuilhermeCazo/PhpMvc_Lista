<?php

namespace App\Controller;

use App\Model\ProdutoModel;

//Criação da Classe Controller 
class ProdutoController extends Controller
{
    public static function index()
    {
        
        
        $model = new ProdutoModel(); 
        $model->getAllRows(); 
        
        parent::render('Produto/ListaProduto', $model);

    }


    public static function form()
    {
        //echo "oi";

        
        $model = new ProdutoModel();

        if(isset($_GET['id'])) 
            $model = $model->getById( (int) $_GET['id']); 
        
            parent::render('Produto/FormProduto', $model);
    }


    public static function save()
    {
       include 'Model/ProdutoModel.php'; 

       $model = new ProdutoModel();

       $model->id =  $_POST['id'];
       $model->descricao = $_POST['descricao'];
       $model->id_categoria = $_POST['id_categoria'];
       $model->preco_venda = $_POST['preco_venda'];
       $model->preco_compra = $_POST['preco_compra'];

       $model->save(); 

       header("Location: /produto"); 
    }


    public static function delete()
    {
        include 'Model/ProdutoModel.php'; 

        $model = new ProdutoModel();

        $model->delete( (int) $_GET['id'] ); 

        header("Location: /produto"); 
    }
}