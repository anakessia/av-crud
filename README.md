
## Desafio - Sistema de login / visualizar, criar, alterar e excluir produtos  

<hr>

### Passo a passo para iniciar o projeto

* Clone Repositório
```sh
git clone https://github.com/anakessia/av-crud.git

```
```sh
cd av_laravel
```

* Crie o Arquivo .env
```sh
cp .env.example .env
```


* Atualize as variáveis de ambiente do arquivo .env (opcional)
```dosini

DB_DATABASE=av_crud

```

* Instale as dependências do projeto
```sh
composer install
```


* Gere a key do projeto Laravel
```sh
php artisan key:generate
```

* Suba as migrates
```sh
php artisan migrate
```

* Acesse o projeto
```sh
php artisan server
```

