# Aplicação Vue.js com Laravel API

Esta aplicação permite gerenciar um cadastro de pessoas com funcionalidades de autenticação, listagem, cadastro, alteração e exclusão de registros, utilizando Vue.js para o frontend e Laravel API para o backend.

## Requisitos

- Node.js
- Composer
- PHP >= 7.4
- MySQL ou PostgreSQL

1. Clone o repositório:
    ```bash
       git clone https://github.com/Emerson-Okopnik/Aplica-o-Vue.js-com-Laravel-API.git
   
Na API
2. Instale as dependências do Laravel

       composer install
       
3. Crie um arquivo .ENV e configure seu Banco da dados, após gere as migrations
      
    ```bash
     php artisan migrate
4. Instale o pacote JWT do Laravel 
  
   ```bash
     composer require tymon/jwt-auth
  
5. Publique o arquivo de configuração do JWT:
  
      ```bash
        git clone https://github.com/Emerson-Okopnik/Aplica-o-Vue.js-com-Laravel-API.git
       
 6. Gere uma chave secreta para o JWT
  
     ```bash
     php artisan jwt:secret

 7. Inicie o Laravel
  
     ```bash
     php artisan serve --host=localhost
 
No app   

 8. Instale as dependências do Vue.js:
   
     ```bash
     npm install
 9. Instale Axios  

     ```bash
     npm install vue axios

 10. Instale o Vite

     ```bash
     git clone https://github.com/Emerson-Okopnik/Aplica-o-Vue.js-com-Laravel-API.git

 11. Inicie Vue.js:

     ```bash
     npm run dev     

Estrutura de Funcionalidades
Autenticação
Implementada via login e token JWT.
O status de autenticação é armazenado no localStorage e validado pela função isAuthenticated em auth.js.
Telas e Funcionalidades
Login - Tela de login inicial, que restringe o acesso às demais funcionalidades da aplicação.
Listagem de Pessoas - Exibe uma lista de pessoas cadastradas com detalhes.
Cadastro de Pessoas - Permite adicionar um novo registro de pessoa.
Alteração de Pessoa - Permite editar dados de uma pessoa existente.
Exclusão de Pessoa - Permite remover uma pessoa cadastrada.
