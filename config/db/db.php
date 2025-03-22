<?php
class Database{
    private $serve = "localhost";
    private $dbname = "dev_media";
    private $user = "root";
    private $pass = "";

    public function connect(){
        try{
            $conn = new PDO(
                "mysql:host=".$this->serve.";dbname=".$this->dbname,
                $this->user,
                $this->pass
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            return $conn;
        }catch(\Exception $e){
            echo "Error: " . $e->getMessage();
        };
    }
}

$teste = new Database();
$teste->connect();