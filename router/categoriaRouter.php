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
                var_dump($id);
                $resultado = $categoriaController->deletarCategoria($id);
                

                if($resultado){
                    header('Location: ../view/pages/categorias.php');
                }else{
                    echo"não foi";
                }

                break;
        default:
            echo 'Não encontrei nada';
            break;
    }
}