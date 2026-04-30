### Fazer um CRUD completo do cadastro de usuário

1. O nome da tabela pode se chamar 'usuarios'
2. É obrigatório ter uma coluna senha, nome e email
3. A senha deve ser criptografada antes de ser salva no banco de dados

password_hash($senha, PASSWORD_BCRYPT)