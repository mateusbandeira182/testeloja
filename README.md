## Loja Virtual

O projeto foi desenvolvido usando PHP 8.2 e o Laravel 9, Bootstrap 5 e JQuery, banco de dados relacional SQLite, devido à infraestrutura já existente previamente na máquina usada para o desenvolvimento.
Além do PHP instalado na máquina, o projeto precisa do [Composer](https://getcomposer.org/) e [Node.js](https://nodejs.org/en/) instalado.

Para executar o projeto, alguns passos precisam ser executados:

- Clonagem desse repositório [Loja Virtual](https://github.com/mateusbandeira182/testeloja.git);
- Com o repositório clonado, navegue através do terminal até a pasta do projeto;
- Na pasta do projeto (testeloja) execute o seguinte comando no terminal: `composer install`;
- O comando irá instalar todas as dependências PHP usadas no projeto;
- Depois da finalização da instalação das depêndencias do PHP (backend), abra o projeto na sua IDE ou editor de sua preferência;
- Faça uma cópia do arquivo '.env.example' e cole no mesmo diretorio onde esta o arquivo original e renomeie-o para '.env';
- No arquivo '.env' vai estar todos as constantes necessárias para o projeto;
- Volte ao terminal, na pasta do projeto, e execute o comando `npm install`;
- Esse comando vai instalar todas as dependências de frontend usadas para a construção do projeto;
- Com as dependências instaladas, execute no terminal, na pasta do projeto, o comando `npm run dev`;
- Esse comando vai compilar, para ambiente de desenvolvimento, todo o projeto do frontend;
- Finalizando a compilação, no terminal execute o comando `php artisan storage:link`;
- Para isso funcionar precisar ter configurado o php como variável de ambiente na máquina.
- Esse comando vai construir os links para as imagens que serão carregadas para a plataforma;
- Após a construção dos links, no terminal, execute o comando `php artisan migrate`;
- Esse comando vai realizar todas as migrações de banco de dados e contruir o mesmo;
- No terminal irá aparecer uma mensagem falando que o arquivo do banco não existe, e vai pedir para criar, digite yes, que o propio laravel vai criar e estruturar o banco de dados;
- Após de realizar as migrações, execute o comando `php artisan serve`, que um servidor PHP será iniciado, geralmente você vai poder acessar pelo dominio (http://localhost:8000/);


## A Loja Virtual

A loja tem as seguites funcionalidades:

- Cadastro de produtos (nome, quantidade, valor, descrição e 3 (três) imagens);
- Carrinho (Adição, remoção e edição);
- Checkout (Verificação e finalização da compra);
- Pedidos realizados (Todos os pedidos realizados)

A loja ainda não foi integrado nenhum sistema de pagamento;

Na barra de menu, existe um itém chamado Produtos, essa listagem seria a visão de quem cadastra os produtos, para acessar o formulário de cadastro de Produtos, entre no menu Produtos e procure o botão Azul (+ Produtos)

## O que foi usado no projeto

- [PHP 8.2](https://www.php.net/downloads);
- [Composer v2.5.1](https://getcomposer.org/);
- [Laravel v9.x](https://laravel.com/);
- [Node.js v18.13.0](https://nodejs.org/en/);
- [Bootstrap v5.3](https://getbootstrap.com/);
- [Fontawesome](https://fontawesome.com/);
- [SQLite](https://www.sqlite.org/index.html);

