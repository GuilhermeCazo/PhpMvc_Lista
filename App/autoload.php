<?php

//o autoload faz com que agnete nao precise mais do include, pq ai o php procurs rprwa gente
//spl --> classesz internas do php ;D
spl_autoload_register(function ($nome_da_classe) {

    //echo "Tentou dar include de: " . $nome_da_classe;

    $classe = dirname(__FILE__) . '/../' . $nome_da_classe . ".php";

    if(file_exists($classe))
    {
        include $classe;
    } else 
        echo 'Arquivo não encontrado: ' . $classe;


    //ele producz pra mim o arquiivo q eu queo dentor do mvc
    //ele serve para o sistema inteiro por isso tem o nome_da_classe

    /*$classe_controller = 'Controller/' . $nome_da_classe . ".php";
    $classe_model = 'Model/' . $nome_da_classe . ".php";
    $classe_dao = 'DAO/' . $nome_da_classe . ".php";

    //se o aquivo pipi existir ele da o include
    //se naão existir ele vai pro de baicos

    if(file_exists($classe_controller))
    {
        include $classe_controller;

    } else if(file_exists($classe_model)) {

        include $classe_model;

    } else if(file_exists($classe_dao)) {
        
        include $classe_dao;
    }*/

    //include 'classes/' . $class . '.class.php';
});