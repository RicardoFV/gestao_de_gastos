# gestao_de_gastos - (Versão - 1)

- Sistema construído para facilitar o controle de gastos.

## Desenvolvimento do Projeto

- O Projeto foi criado usando o PHP 7.4, MySQL 5.4 e servidor nginx.

- Projeto criado utilizando o Docker.

## Arquitetura Do projeto

> Modelagem de Dados

<br>

![modelo relacional v1](https://user-images.githubusercontent.com/48629398/230806806-18d0ce9b-5c39-4cc5-84a3-fde5972480f4.png)


<br>

## Configurações Do projeto

- Segue os passos para executaro projeto

1 - Baixar o projeto no git; <br>
2 - Executar o docker : docker-compose build (necessário ter o Docker instalado);<br>
3 - Subir o container : docker-compose up -d; <br>
4 - Apos subir o  projeto, acessa o container do PHP : docker exec -it 'nome do conteiner' bash; <br>
5 - Execute composer install; <br>
6 - Execute php artisan migrate; <br>
7 - Dentro da pasta do projeto, acesse uma chamada documentos e depois a pasta sql; <br>
8 - Realiza a criação das procedures "procedure_cadastra_permissoes_rota, procedure_cadastra_rotas, procedure_cadastra_usuario"; <br>
9 - Ápos isso, execute a segunte procedure "execucao das procedures", ela executará todas as 3 criada anteriormente; <br>
10 - Pronto, projeto configurado; <br>

- O usuário administrador, esta configurado na procedure "procedure_cadastra_usuario", através dele você fará a configurações do tipo e subtipo, pois somente o administador poderá fazer tal ação. <br>

- No sistema ha apenas dois niveis de usuário, o "super e usuário";  <br>

- Deixei um backup do banco, caso queira fazer uso. 
