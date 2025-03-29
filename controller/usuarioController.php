
<?php

require_once __DIR__ . "/../config/db/db.php";
class UsuarioController{
    public $conn;
    public function __construct(){
        $banco = new Database();
        $this->conn= $banco->connect();
    }

    public function listarUsuarios(){
       try{
        $sql = "SELECT * FROM usuarios";
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

    public function cadastrarUsuario($name, $pass){
        try{
         $sql = "INSERT INTO usuarios (nome, senha) VALUES (:name, :pass)";

         $db = $this->conn->prepare($sql);
         $db->bindParam(':name', $name);
         $db->bindParam(':pass', $pass);

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

    public function getUserById($id){
        try{
            $sql = "SELECT * FROM usuarios WHERE id = :id";
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

    public function atualizarUsuario($id, $name, $email){
        try{
            $sql = "UPDATE usuarios SET nome = :name, senha = :email WHERE id = :id";
            $db = $this->conn->prepare($sql);
            $db->bindParam(':name', $name);
            $db->bindParam(':pass', $pass);
            $db->bindParam(':id', $id);
    
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

    public function deletarUsuario($id){

       try{
            $_sql = 'DELETE FROM usuarios WHERE id = :id';
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
