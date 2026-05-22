# Inicio do projeto com Docker.

## Dockerfile
 - O arquivo Dockerfile cria a imagem que define como será montado o container;
 - Utilizaremos a imagem do apache para o server-web baixado direto do dockerhub;
 - WORKDIR define a pasta padrão de operação do container
 - Intalamos também a exetenção PDO para trabalho com nosso db

## Docker-compose
  - O arquivo docker-compose.yml é o arquivo operario.
  - Os comando digitados no bash (os comandos estarão mais abaixo) utilizaram este arquivo como contrutor dos containers e fornece a conexão entre eles.

# Como rodar o projeto no Docker

## Pré requesitos:
 - Docker
 - Docker Compose

## Passo a passo
 #### comando via bash

 1. Cole o repoositório
 - git clone https://github.com/MatrCastelini23/controle-finan

 2. Suba os containers
 - docker compose up -d --build

 3. Importe o banco descrito no db.sql
 - docker exec -i banco-controle-finan mysql -u root -proot < db.sql

 4. Acesse o projeto no navegador.
 - http://localhost:5000