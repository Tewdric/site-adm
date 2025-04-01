
<?php

require_once __DIR__ . "/../config/db/db.php";
class ArtigoController{
    public $conn;
    public function __construct(){
        $banco = new Database();
        $this->conn= $banco->connect();
    }

    public function listarArtigos(){
       try{
        $sql = "SELECT  artigos.id, artigos.texto, usuarios.nome, categorias.categoria from artigos
        inner JOIN usuarios on artigos.id_categoria= usuarios.id
        inner join categorias on artigos.id_categoria = categorias.id";
        $db = $this->conn->prepare($sql);
        $db->execute();

        $usuarios = $db->fetchAll(PDO::FETCH_ASSOC);

        if($usuarios){
            return $usuarios;
        }
        else{
            return false;
        }
       }
       catch(\Exception $e){
        echo "Error: " . $e->getMessage();
       }
    }

    public function cadastrarArtigo($texto, $categoria, $autor){
        try{
         $sql = "INSERT INTO artigos (texto, id_categoria, id_autor) VALUES (:texto, :categoria, :autor)";

         $db = $this->conn->prepare($sql);
         $db->bindParam(':texto', $texto);
         $db->bindParam(':categoria', $categoria);
         $db->bindParam(':autor', $autor);

         if($db->execute()){
            return true;
         }
         else{
            return false;
         }
        }
        catch(\Exception $e){
         echo "Error: " . $e->getMessage();
        }
     }

    public function getCategoriaById($id){
        try{
            $sql = "SELECT * FROM artigos WHERE id = :id";
            $db = $this->conn->prepare($sql);
            $db->bindParam(':id', $id);
            $db->execute();
    
            $usuario = $db->fetch(PDO::FETCH_ASSOC);
    
            if($usuario){
                return $usuario;
            }
            else{
                return false;
            }
        }
        catch(\Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function atualizarArtigo($id, $texto, $categoria, $autor){
        try{
            $sql = "UPDATE artigos SET texto = :texto, id_categoria = :categoria, id_autor=:autor WHERE id = :id";
            $db = $this->conn->prepare($sql);
            $db->bindParam(':id', $id);
            $db->bindParam(':texto', $texto);
            $db->bindParam(':categoria', $categoria);
            $db->bindParam(':autor', $autor);
    
            if($db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        catch(\Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function deletarArtigo($id){

       try{
            $_sql = 'DELETE FROM artigos WHERE id = :id';
            $db = $this->conn->prepare($_sql);
            $db->bindParam(':id', $id);
            if($db->execute()){
                return true;
            }
            else{
                return false;
            }
       }catch(\Exception $e){
        echo "Error: " . $e->getMessage();
       }
    }
       
};
