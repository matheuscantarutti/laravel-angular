# laravel-angular

Web app com front-end Angular e back-end Laravel+PostgreSQL

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

```

### Angular
