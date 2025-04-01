<?php

require_once __DIR__.'/../controller/categoriaController.php';
$categoriaController = new CategoriaController();

if($_SERVER['REQUEST_METHOD'] == 'POST'){


    switch($_GET['acao']){
        case 'create':
            
            $resultado = $categoriaController->cadastrarCategorias( $_POST['categoria']);
            
            if($resultado){
                header('Location: ../view/pages/categorias.php');
            }else{
                header('Location: ../view/pages/categorias.php');
            }
            break;
        case 'update':

            $id = $_POST['id'];
            $categoria = $_POST['categoria'];


            
            $resultado = $categoriaController->atualizarCategoria($id, $categoria);
          
            if($resultado){
                header('Location: ../view/pages/categorias.php');
            }else{
                header('Location: ../view/pages/categorias.php?id='.$id);
            }
            break;
        case 'delete':
            $id = $_POST['id'];
            
            // Chama a função para deletar o usuário
            $resultado = $categoriaController->deletarCategoria($id);
            
            // Verifica se a exclusão foi bem-sucedida
            if ($resultado) {
                // Se a exclusão foi bem-sucedida, redireciona para a página de usuários
                header('Location: ../view/pages/categorias.php');
                exit; // Certifique-se de que o código não continuará executando após o redirecionamento
            } else {
                // Caso a exclusão falhe, armazenamos a mensagem de erro na sessão
                $_SESSION['erro'] = 'Este produto está vinculado a um pedido e não pode ser excluído!';
                
                // Redireciona para a página de usuários
                header('Location: ../view/pages/categorias.php');
                exit; // Garante que o script pare aqui
            }
        default:
            echo 'Não encontrei nada';
            break;
    }
}