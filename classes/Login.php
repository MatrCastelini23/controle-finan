<?php
    require_once 'Database.php';

    class Login {
        private $db;

        public function __construct(){
            $this->db = (new Database())->connect();
        }

        public function logar($email, $password){
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            //o prepare envia a query sem os dados
            //O banco recebe a estrutura da query e já a compila. O :email é só um marcador/placeholder(apelido), nenhum dado real ainda.
            $stmt = $this->db->prepare($sql);
            //o bindParam vincula a variavel ao placeholder
            $stmt->bindParam(':email', $email);
            //o execute faz a execução da query com os dados vinculados
            $stmt->execute();
            //variavel para armazenar o usuario buscado na query
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            //if que verfica se o email existe e a senha está correta
            if($user && password_verify($password, $user['senha'])){
                echo "login feito";
            }else{
                echo "login não feito";
            };
        }
    }

?>