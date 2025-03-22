
<?php

require_once __DIR__ . "/../config/db/db.php";
class CategorialController{
    public $conn;
    public function __construct(){
        $banco = new Database();
        $this->conn= $banco->connect();
    }

    public function listarCategorias(){
       try{
        $sql = "SELECT * FROM categorias";
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

    public function cadastrarArtigo($categoria){
        try{
         $sql = "INSERT INTO categorias (categoria) VALUES (:categoria)";

         $db = $this->conn->prepare($sql);
         $db->bindParam(':categoria', $categoria);

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
            $sql = "SELECT * FROM categoria WHERE id = :id";
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

    public function atualizarCategoria($categoria){
        try{
            $sql = "UPDATE categoria SET categoria = :categoria WHERE id = :id";
            $db = $this->conn->prepare($sql);
            $db->bindParam(':categoria', $categoria);
    
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

    public function deletarCategoria($id){

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
