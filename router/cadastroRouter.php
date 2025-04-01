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
            session_start(); // Inicia a sessão para armazenar a mensagem

            $id = $_POST['id'];
            
            // Chama a função para deletar o usuário
            $resultado = $cadastrarController->deletarUsuario($id);
            
            // Verifica se a exclusão foi bem-sucedida
            if ($resultado) {
                // Se a exclusão foi bem-sucedida, redireciona para a página de usuários
                header('Location: ../view/pages/usuarios.php');
                exit; // Certifique-se de que o código não continuará executando após o redirecionamento
            } else {
                // Caso a exclusão falhe, armazenamos a mensagem de erro na sessão
                $_SESSION['erro'] = 'Este usuário possui artigos cadastrados!';
                
                // Redireciona para a página de usuários
                header('Location: ../view/pages/usuarios.php');
                exit; // Garante que o script pare aqui
            }

        default:
            echo 'Não encontrei nada';
            break;
    }
}