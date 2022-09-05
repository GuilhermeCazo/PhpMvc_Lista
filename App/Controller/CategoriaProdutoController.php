<?php

namespace App\Controller;

use App\Model\CategoriaProdutoModel;

class CategoriaProdutoController extends Controller
{
    public static function index()
    {
        
        
        $model = new CategoriaProdutoModel(); 
        $model->getAllRows(); 
      
        parent::render('CategoriaProduto/FormCategoriaProduto', $model);
    }


    public static function form()
    {
        //echo "oi";

        
        $model = new CategoriaProdutoModel();

        if(isset($_GET['id'])) 
            $model = $model->getById( (int) $_GET['id']); 
        
            parent::render('CategoriaProduto/FormCategoriaProduto', $model);
    }


    public static function save()
    {
       include 'Model/CategoriaProdutoModel.php'; 

       $model = new CategoriaProdutoModel();

       $model->id =  $_POST['id'];
       $model->nome = $_POST['nome'];
    

       $model->save(); 

       header("Location: /categoria_produto"); 
    }


    public static function delete()
    {
        include 'Model/CategoriaProdutoModel.php'; 

        $model = new CategoriaProdutoModel();

        $model->delete( (int) $_GET['id'] ); 

        header("Location: /categoria_produto"); 
    }
}