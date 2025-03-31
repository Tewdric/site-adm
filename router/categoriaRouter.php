<?php

require_once __DIR__.'/../controller/categoriaController.php';
$categoriaController = new CategoriaController();

if($_SERVER['REQUEST_METHOD'] == 'POST'){


    switch($_GET['acao']){
        case 'create':
            
            $resultado = $categoriaController->atualizarCategoria($_POST['id'],  $_POST['nome']);

            if($resultado){
                header('Location: ../view/home/index.php');
            }else{
                header('Location: ../view/cadastro/cadastro.php');
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