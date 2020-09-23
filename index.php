<?php

    require_once("config.php");

    // exibir todos os funcionarios cadastrados
    // $sql = new Sql();   
    // $usuarios = $sql->select("SELECT * FROM tb_usuarios");
    // echo json_encode($usuarios);

    $root = new Usuario();
    
    $root->loadById(9);
    
    echo $root;


?>