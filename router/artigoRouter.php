<?php

require_once __DIR__.'/../controller/artigoController.php';
$artigoController = new ArtigoController();

if($_SERVER['REQUEST_METHOD'] == 'POST'){


    switch($_GET['acao']){
        case 'create':
            
            $resultado = $artigoController->cadastrarUsuario($_POST['name'],  $_POST['email']);

            if($resultado){
                header('Location: ../view/home/index.php');
            }else{
                header('Location: ../view/cadastro/cadastro.php');
            }
            break;
        case 'update':

            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];


            $resultado = $cadastrarController->atualizarUsuario($id, $nome, $email);
          
            if($resultado){
                header('Location: ../view/pages/usuarios.php');
            }else{
                header('Location: ../view/cadastro/cadastro.php?id='.$id);
            }
            break;
        case 'delete':
                $id = $_POST['id'];

                $resultado = $cadastrarController->deletarUsuario($id);

                if($resultado){
                    // header('Location: ../view/pages/home.php');
                    print("Excluiu");
                }else{
                    // header('Location: ../view/pages/home.php');
                    print("Não foi");
                }

                break;
        default:
            echo 'Não encontrei nada';
            break;
    }
}