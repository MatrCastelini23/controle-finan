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

            echo 'Usuário cadastrado com sucesso!';
        }

        public function checarEmail($email){
            //select ID para passar só um valor e não um array
            $sql = "SELECT id FROM usuarios WHERE email = :email LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            //fetch() retorna o dado ou false se não encotrar nada
            return $stmt->fetch() !== false;
        }

    } 
?>