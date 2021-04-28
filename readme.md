### Laravel com CRUD completo e consumo de API externa

### Necessários: Composer, laravel, php 7, mySQL, APIs, PostMan ou Insomnia

### Instruções

Baixar o projeto

Dentro do diretório raiz do projeto, abrir o prompt de comando e executar:

```
composer update
```

Criar uma base de dados no MySQL e criar um arquivo .env seguindo o .env.example, alterando os dados de conexao a base 

```
DB_CONNECTION=mysql
DB_HOST=<seu host>
DB_PORT=3306
DB_DATABASE=<sua database>
DB_USERNAME=<seu usuário>
DB_PASSWORD=<sua senha>
```

No prompt, caso seja preciso gerar chave para o projeto, executar:

```
php artisan key:generate
```

No prompt, executar para montar a base (dentro do arquivo /database/seeds/EstadosSeeder.php consta consumo da api https://servicodados.ibge.gov.br/api/v1/localidades/estados):
```
php artisan migrate:refresh --seed
```

Executado a sequência acima, execute o projeto:
```
php artisan serve
```

### Rotas e modelos de requisição

GET: http://localhost:8000/api/produtos/listar

GET: http://localhost:8000/api/produtos/detalhes/1

POST: http://localhost:8000/api/produtos/salvar
```
{
	"nome_produto":"Arroz",
	"quantidade":5,
	"disponivel":"s",
	"id_produto_tipo":1
}
```

PUT: http://localhost:8000/api/produtos/atualizar/1
```
{
	"nome_produto":"Arroz",
	"quantidade":15,
	"disponivel":"s",
	"id_produto_tipo":1
}
```

DELETE: http://localhost:8000/api/produtos/remover/1

### Testes

O projeto possui testes de requisição de todas as rotas dispostos em /tests/Feature/RequisicoesApiTest.php
Para executar, no terminal, digite:
```
 ./vendor/bin/phpunit
 ```
