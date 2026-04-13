<?php
    require_once 'Database.php';

    class NovoUsuario {
        private $db;

        public function __construct() {
            $this->db = (new Database())->connect();
        }

        public function novoUsuario($name, $email, $password){
            $hasedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                'nome' => $name,
                'email' => $email,
                'senha' => $hasedPassword
            ]);
        }
    } 
?>