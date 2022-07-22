<?php 
    class banco{
        private $servidor = "localhost";
        private $usuario = "root";
        private $senha = "";
        private $dbName = "EasyInvestDiario";

        function conectar(){
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbName);
            

            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }
            else{
                echo "Connected successfully";
                return $conn;
            }
            

        }

        
        
    }
 
?>