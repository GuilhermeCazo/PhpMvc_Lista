<?php

use App\Controller\
{
    PessoaController,
    ProdutoController,
    CategoriaProdutoController,
    LoginController,
};


$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Para saber mais estrutura switch, leia: https://www.php.net/manual/pt_BR/control-structures.switch.php
switch($url)
{
    case '/':
        echo "página inicial";
    break;

    case '/login':
        LoginController::index();
    break;

    case '/login/auth':
        LoginController::auth();
    break;

    case '/logout':
        LoginController::logout();
    break;


    case '/pessoa':
        // Para saber mais sobre o Operador de Resolução de Escopo (::), 
        // leia: https://www.php.net/manual/pt_BR/language.oop5.paamayim-nekudotayim.php
        PessoaController::index();
    break;

    case '/pessoa/form':
        PessoaController::form();
    break;

    case '/pessoa/form/save':
        PessoaController::save();
    break;

    case '/pessoa/delete':
        PessoaController::delete();
    break;


    //produtos:

    case '/produto':
        ProdutoController::index();
    break;

    case '/produto/form':
        ProdutoController::form();
    break;

    case '/produto/form/save':
        ProdutoController::save();
    break;

    case '/produto/delete':
        ProdutoController::delete();
    break;



    // Categoria de Produto
    
    case '/categoria_produto':
        CategoriaProdutoController::index();
    break;

    case '/categoria_produto/form':
        CategoriaProdutoController::form();
    break;

    case '/categoria_produto/form/save':
        CategoriaProdutoController::save();
    break;

    case '/categoria_produto/delete':
        CategoriaProdutoController::delete();
    break;


    

    default:
        echo "Erro 404";
    break;
}