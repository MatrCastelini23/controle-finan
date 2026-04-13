# Conexão com o banco
    todas as operações do CRUD são enviadas ao banco através da classe Database.php
    Nas operações do CRUD, verificar a possibilidade de utilizar o Prepare/bindParam ao vez de query para evitar consultas nulas.