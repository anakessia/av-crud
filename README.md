
## Desafio - Sistema de login / visualizar, criar, alterar e excluir produtos  

<hr>

### Passo a passo para iniciar o projeto
<br>
* Clone Repositório
```sh
git clone https://github.com/anakessia/av-crud.git

```
```sh
cd av_laravel
```

<br>
* Crie o Arquivo .env
```sh
cp .env.example .env
```


<br>
* Atualize as variáveis de ambiente do arquivo .env (opcional)
```dosini

DB_DATABASE=av_crud

```

<br>
* Instale as dependências do projeto
```sh
composer install
```


<br>
* Gere a key do projeto Laravel
```sh
php artisan key:generate
```

<br>
* Suba as migrates
```sh
php artisan migrate
```

<br>
* Acesse o projeto
```sh
php artisan server
```

