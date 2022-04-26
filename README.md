# laravel-angular

Web app com front-end Angular e back-end Laravel+PostgreSQL.

:Conceitos

front => 'mobile first'
back => 'RESTfull'

## Caixa de Ferramentas

PHP 8.1
PostgreSQL 12.0
Angular 13
NodeJs 16.10
Composer
npm

## Configuração de Ambiente

### Laravel+PostgreSQL

Após clonar o projeto, acesse o diretório da API e instale o composer.

Caso já possua o composer instalado globalmente, basta executar:

```
$ composer install
```

Do contrário, faça o download do arquivo composer.phar no link:

https://getcomposer.org/composer-stable.phar

Após o download, execute o seguinte comando:

```
php composer.phar
```
Em seguida, para iniciar o servidor do artisan, efetue:

```
php artisan serve
```

Crie um arquivo .env a partir do exemplo e reescreva as informações de banco de dados conforme a sua configuração local.<br>
Para manipulação das tabelas recomendo o DBeaver pela facilidade.<br> 
A migração dos dados é feita assim:

```
php artisan migrate
php artisan db:seed
```

Laravel serve suas aplicaçoes na porta 8000.

### Angular

Faça download do npm e do node, de preferência nas versões 6.1 e 16.10 respectivamente.
Em seguida, realize a instalação do Angular

```
npm install -g @angular/cli
```

Ao finalizar a instalação, acesse o diretório do Angular e realize o comando:

```
ng serve --open
```
Por padrão, o Angular executa na porta 4200.

### Collection do Postman
https://www.getpostman.com/collections/86bc9311ab033f2e3943
