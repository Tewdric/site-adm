<?php

require_once __DIR__.'/../controller/artigoController.php';
$artigoController = new ArtigoController();

if($_SERVER['REQUEST_METHOD'] == 'POST'){


    switch($_GET['acao']){
        case 'create':
            
            $resultado = $artigoController->cadastrarArtigo($_POST['texto'],  $_POST['categoria'],$autor['autor']);

            if($resultado){ 
                header('Location: ../view/pages/artigos.php');
            }else{
               echo'falhou';
            }
            break;
        case 'update':

            $id = $_POST['id'];
            $texto = $_POST['texto'];
            $categoria = $_POST['categoria'];
            $autor = $_POST['autor'];

            var_dump($id,$texto,$categoria,$autor);

            $resultado = $artigoController->atualizarArtigo($id, $texto, $categoria, $autor);
            var_dump($resultado);
            
            if($resultado){
                header('Location: ../view/pages/artigos.php');
            }else{
                header('Location: ../view/pages/artigos.php?id='.$id);
            }
            break;
        case 'delete':
                $id = $_POST['id'];

                $resultado = $artigoController->deletarArtigo($id);

                if($resultado){
                    header('Location: ../view/pages/artigos.php');
                   
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