<?php


    require_once("config.php");

    //exibir todos os funcionarios cadastrados
/*     $sql = new Sql();   
    $usuarios = $sql->select("SELECT * FROM tb_usuarios");
    echo json_encode($usuarios); */

    //Localiza um usuario pelo id
    $usuario = new Usuario();   
    $usuario->loadById(11);  

/*     //Lista todos os usuarios
    $lista = Usuario::getList();
    echo json_encode($lista); */

/*     //Localiza todos os usuarios pelo nome
    $search = Usuario::search("roo");
    echo json_encode($search);
 */

/*     //Valida o usuario e a senha
    $usuario = new Usuario();
    $usuario->login("root","!@#$"); */

/*     //Insere um novo usuario
    $usuario = new Usuario("Celi","3345");
    $usuario->insert(); */

    
    //Atualiza um usuario carregado na memoria / Classe
    $usuario->update("Conceição", "271255");

    
/*     
    //Deleta um usuario
    $usuario->delete();

 */
    echo $usuario;

?>