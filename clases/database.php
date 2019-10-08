<?php
    
    class Database{
        private $dbServerName = "127.0.0.1";
        private $dbUsername = "root";
        private $dbPassword = "Cordero1823";
        private $dbName = "lab3";

        public function create_connection(){
            // create connection
            $conn = new mysqli($this->dbServerName, $this->dbUsername, $this->dbPassword, $this->dbName);
            // check connection
            if ($conn->connect_error) {
                echo $conn->connect_error;
            }
            mysqli_set_charset($conn, "utf8");
            return $conn;
        }

        public function login($username, $password)
        {
            $conn = $this->create_connection();

            $call = mysqli_prepare($conn, 'CALL validar_login(?,?,@res)');
            mysqli_stmt_bind_param($call,"ss", $username,$password);
            mysqli_stmt_execute($call);

            $select = mysqli_query($conn, 'Select @res');
            $res = mysqli_fetch_assoc($select);
            return $res['@res'];
        }
    }    