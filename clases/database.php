<?php
    
    class Database
    {
        private $dbServerName = "127.0.0.1";
        private $dbUsername = "root";
        private $dbPassword = "Cordero1823";
        private $dbName = "lab3";

        public function create_connection()
        {
            // create connection
            $conn = new mysqli($this->dbServerName, $this->dbUsername, $this->dbPassword, $this->dbName);
            // check connection
            if ($conn->connect_error) {
                echo $conn->connect_error;
            }
            mysqli_set_charset($conn, "utf8");
            return $conn;
        }

        public function delete_connection($conn)
        {
            mysqli_close($conn);
        }

        public function login($username, $password)
        {
            $conn = $this->create_connection();

            $call = mysqli_prepare($conn, 'CALL validar_login(?,?,@res)');
            mysqli_stmt_bind_param($call, "ss", $username, $password);
            mysqli_stmt_execute($call);

            $select = mysqli_query($conn, 'Select @res');
            $res = mysqli_fetch_assoc($select);

            $this->delete_connection($conn);
            return $res['@res'];
        }

        public function getDatauser($username)
        {
            $conn = $this->create_connection();
            $conn->next_result();
            $sql = "CALL obtener_usuario('$username')";

            $res = $conn->query($sql);
            $row = $res->fetch_array();

            $this->delete_connection($conn);
            return $row;
        }

        public function updatePassword($username, $password, $new_password)
        {
            $conn = $this->create_connection();

            $call = mysqli_prepare($conn, 'CALL validar_login(?,?,@res)');
            mysqli_stmt_bind_param($call, "ss", $username, $password);
            mysqli_stmt_execute($call);

            $select = mysqli_query($conn, 'Select @res');
            $res = mysqli_fetch_assoc($select);

            
            if ($res['@res'] == 1) {
                $call = mysqli_prepare($conn, 'CALL cambiar_clave(?,?)');
                mysqli_stmt_bind_param($call, "ss", $new_password, $username);
                mysqli_stmt_execute($call);
                $this->delete_connection($conn);
                return 1;
            } else {
                $this->delete_connection($conn);
                return 0;
            }
        }

        public function usernameValidate($username)
        {
            $conn = $this->create_connection();

            $call = mysqli_prepare($conn, 'CALL validar_nickname(?,@res)');
            mysqli_stmt_bind_param($call, "s", $username);
            mysqli_stmt_execute($call);

            $select = mysqli_query($conn, 'Select @res');
            $res = mysqli_fetch_assoc($select);

            $this->delete_connection($conn);

            return $res['@res'];
        }

        public function emailValidate($email)
        {
            $conn = $this->create_connection();

            $call = mysqli_prepare($conn, 'CALL validar_correo(?,@res)');
            mysqli_stmt_bind_param($call, "s", $email);
            mysqli_stmt_execute($call);

            $select = mysqli_query($conn, 'Select @res');
            $res = mysqli_fetch_assoc($select);

            $this->delete_connection($conn);
            
            return $res['@res'];
        }

        public function createUser($nombre, $lastname1, $lastname2, $username, $password, $email, $number)
        {
            $conn = $this->create_connection();
            $rol = 0;
            
            $call = mysqli_prepare($conn, 'CALL crear_usuario(?,?,?,?,?,?,?,?)');
            mysqli_stmt_bind_param($call, "sssssssi", $nombre, $lastname1, $lastname2, $username, $password, $email, $number, $rol);
            
            if (!mysqli_stmt_execute($call)) {
                $this->delete_connection($conn);
                return 0;
            }

            $this->delete_connection($conn);
            return 1;
        }
    }
