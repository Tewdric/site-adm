<?php

require_once __DIR__.'/../controller/usuarioController.php';
$cadastrarController = new UsuarioController();

if($_SERVER['REQUEST_METHOD'] == 'POST'){


    switch($_GET['acao']){
        case 'create':
            
            $resultado = $cadastrarController->cadastrarUsuario($_POST['nome'],  $_POST['email']);

            if($resultado){
                header('Location: ../view/pages/usuarios.php');
            }else{
                echo("erro");
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
                    header('Location: ../view/pages/usuarios.php');
                   
                }else{
                    header('Location: ../view/pages/usuarios.php');
                }

                break;
        default:
            echo 'Não encontrei nada';
            break;
    }
}