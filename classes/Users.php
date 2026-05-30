<?php
    require_once 'Database.php';
    // classe para lidar com as operações relacionadas aos usuários
    class Users {
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

            //incia a sessao
            session_start();
            //if que verfica se o email existe e a senha está correta
            if($user && password_verify($password, $user['senha'])){
                session_regenerate_id(true); // Previne session fixation
                //se for verdadeiro sera gerado essas variaveis de sessao
                $_SESSION['logado'] = true;
                $_SESSION['nome'] = $user['nome'];
                header('Location: index.php');
            } else {
                //se for verdadeiro da essa mensagem
                echo "Credenciais erradas";
            }
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

        public function checarEmail($email){
            //select ID para passar só um valor e não um array
            $sql = "SELECT id FROM usuarios WHERE email = :email LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            //fetch() retorna o dado ou false se não encotrar nada
            return $stmt->fetch() !== false;
        }

        public function listarUsuarios(){
            $sql = "SELECT id, nome, email FROM usuarios";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function listarUsuario(){
            $sql = "SELECT id, nome, email FROM usuarios WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $_GET['id']);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function editarUsuario($id, $name, $email, $senha) {
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id); // usa $id no lugar de $_GET['id']
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user && password_verify($senha, $user['senha'])){
                $updateSql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
                $stmt = $this->db->prepare($updateSql);
                $stmt->bindParam(':nome', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                echo "Usuário editado com sucesso!";
            } else {
                echo "Credenciais erradas para edição de usuário.";
            }
        }

        public function deletarUsuario($id, $senha){
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user && password_verify($senha, $user['senha'])){
                $deleteSql = "DELETE FROM usuarios WHERE id = :id";
                $stmt = $this->db->prepare($deleteSql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
            } else {
                echo "Credenciais erradas para deleção de usuário.";
            }
        }
    }

?>