<?php

require_once "Database.php";

class Usuario {
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->connect();
    }

    public function criarUsuario($nome, $email, $senha){
        $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            "nome" => $nome,
            "email" => $email,
            "senha" => $senhaHash
        ]);
    }

    // Validar credenciais de login
    public function validarLogin($email, $senha) {
        $sql = "SELECT id, nome, senha FROM usuarios WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }
}


?>