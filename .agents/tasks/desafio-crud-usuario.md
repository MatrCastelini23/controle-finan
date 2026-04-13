### Fazer um CRUD completo do cadastro do usuário


1. O nome da tabela pode se chamar 'usuarios'
2. É obrigatório ter uma coluna senha, nome e e-mail.
3. A senha deve ser criptografada antes de ser salva no banco de dados


password_hash($senha, PASSWORD_CRYPT ou DEFAULT) -> criptografa a senha

password.verify -> validação