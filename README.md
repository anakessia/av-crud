
## CRUD de cadastro de usuários e produtos.
<hr>
<p>Desenvolvi este projeto CRUD de usuários e produtos usando a framework Laravel, esse sistema permite que você gerencie os usuários e produtos como criar, visualizar, atualizar e excluir.</p>
<p>O front-end foi construído usando Bootstrap, Vite e Blade.</p>


### Passo a passo para iniciar o projeto

- Clone Repositório:
```sh
git clone https://github.com/anakessia/av-crud.git

```
- Navegue até o diretório do projeto:
```sh
cd av-crud
```

- Copie o Arquivo .env:
```sh
cp .env.example .env
```


- Atualize as variáveis de ambiente do arquivo .env (opcional):
```dosini

DB_DATABASE=av_crud

```

- Instale as dependências do Composer:
```sh
composer install
```


- Gere uma chave no projeto:
```sh
php artisan key:generate
```

- Execute as migrações:
```sh
php artisan migrate
```

- Inicie o servidor:
```sh
php artisan serve
```

- Acesse o projeto no navegador:
```sh
http://127.0.0.1:8000
```

