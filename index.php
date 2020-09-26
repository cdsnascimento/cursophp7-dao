<?php

    require_once("config.php");

    //exibir todos os funcionarios cadastrados
    // $sql = new Sql();   
    // $usuarios = $sql->select("SELECT * FROM tb_usuarios");
    // echo json_encode($usuarios);

    // $root = new Usuario();   
    // $root->loadById(8);  
    // echo $root;

    // $lista = Usuario::getList();
    // echo json_encode($lista);

    // $search = Usuario::search("roo");
    // echo json_encode($search);

    $usuario = new Usuario();
    $usuario->login("root","!@#$");

    echo $usuario;


?>