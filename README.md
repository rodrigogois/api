<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

API 
===================

> **Instalação:**

> - Baixe e instale o composer [aqui](https://getcomposer.org/download/)
> - Instale o laravel via prompt de comando utilizando: `composer global require "laravel/installer"`
> - Apos composer e laravel instalados, via prompt de comando navegue até o diretorio do projeto e execute o comando ` composer update` para restaurar todas as dependencias

#### Banco de dados
> O script de criação do banco está na pasta database : "api.sql"

#### Tabelas:

>`migrations` : são controles de versão para o banco de dados, através desta tabela o Laravel controla todas as migrations.

>`users`: tabela gerada pelo ***auth*** do Laravel para controle de usuarios 

>`password_resets`: tabela criado pelo ***auth*** do Laravel para controle do reset de senhas

>`oauth_access_tokens`:  tabela criada pelo ***Laravel Passport*** para controle dos tokens de autenticação entre o cliente e o servidor

>`oauth_auth_codes`:  tabela criada pelo ***Laravel Passport***

>`oauth_clients`: tabela criada pelo ***Laravel Passport***

>`oauth_personal_access_clients`:  tabela criada pelo ***Laravel Passport***

>`oauth_refresh_tokens`: tabela criada pelo ***Laravel Passport***


## Funcionalidade de cliente

#### Cadastrar cliente

![Alt text] (https://lh4.googleusercontent.com/SmlRPfJjDJQ8EMgACVbEeqJSLJRaV9lRaAsZNBQJDFq78SCHq115ePVjgE8NzD1O0Kio3oAUvrZ1UmA=w1366-h637-rw)

> `url:` localhost:8000/api/Client

> `verbo http:` POST 

> `parâmetros:` 
-             name, 
-             email, 
-             address, 
-             observation, 
-             photo, -> url da foto
-             consultant_id, -> tem foreing key na tabela so aceita ID cadastrado na tabela consultor
-             phone 

## listar clientes

![Alt text] (https://lh6.googleusercontent.com/qXh54i73JZkdJG5u3wuMpHTgQUR8dGWK2SKLU434yR9w9l5SVnE42I0jkPsZf8Gl47KobeWSXy6MNXQ=w1366-h637-rw)

> `url:` localhost:8000/api/Client

> `verbo http:` GET 

> `parâmetros:` Não Possui

## Obter um clientes por id

![Alt text] (https://lh6.googleusercontent.com/ICiqmFnxOiW6EiWYT4fpF8Hew275cRas65HIlER9qHh1yUtLIXWOOli8vg2w3U8K3MNxtLAHH4QX36s=w1366-h637-rw)

> `url:` localhost:8000/api/Client/{id}

> `verbo http:` GET 

> `parâmetros:` client_id (url)

## Editar cliente

![Alt text] (https://lh3.googleusercontent.com/h1-uXnwQAXsC2C_RNSDbS1omTMwmheWeuCMBzfGLPkQoDpswmrNlX5HRL10RSlK24LphKP5BUt8rlKc=w1366-h637-rw)

> `url:` localhost:8000/api/Client/{id}

> `verbo http:` PUT 

> `parâmetros:` client_id (url) 
-               name, 
-               email, 
-               address, 
-               observation, 
-               photo, -> url da foto
-               consultant_id, -> tem foreing key na tabela so aceita ID cadastrado na tabela consultor
-               phone


## Excluir um cliente

![Alt text] (https://lh5.googleusercontent.com/8Hrm2-eGStRPxWg3lzKBfpf2kpgvHUYUFZLKsdqxmdCZ-Ij3Ji8PtlR5oxzfnq4PJYy7iCbAp3M93Zc=w1366-h637-rw)

> `url:` localhost:8000/api/Client/{id}

> `verbo http:` DELETE 

> `parâmetros:` client_id (url)

## Rotas
```txt
+--------+-----------+------------------------------------+--------------------+--------------------------------------------------------------+-------------------+
|        | GET|HEAD  | /                                  |                    | Closure                                                      | web               |
|        | POST      | api/auth/signin                    |                    | App\Http\Controllers\Api\AuthController@authenticated        | api,cors          |
|        | POST      | api/auth/signup                    |                    | App\Http\Controllers\Api\AuthController@loginAuth            | api,cors          |
|        | GET|HEAD  | api/auth/user                      |                    | App\Http\Controllers\Api\AuthController@getAuthenticatedUser | api,cors          |
|        | POST      | api/catalogue                      | catalogue.store    | App\Http\Controllers\Api\CatalogueController@store           | api,cors,jwt.auth |
|        | GET|HEAD  | api/catalogue/list/{consultant_id} | catalogue.index    | App\Http\Controllers\Api\CatalogueController@index           | api,cors,jwt.auth |
|        | GET|HEAD  | api/catalogue/{catalogue_id}       | catalogue.show     | App\Http\Controllers\Api\CatalogueController@show            | api,cors,jwt.auth |
|        | DELETE    | api/catalogue/{catalogue_id}       | catalogue.destroy  | App\Http\Controllers\Api\CatalogueController@destroy         | api,cors,jwt.auth |
|        | PUT       | api/catalogue/{catalogue_id}       | catalogue.update   | App\Http\Controllers\Api\CatalogueController@update          | api,cors,jwt.auth |
|        | POST      | api/client                         | client.store       | App\Http\Controllers\Api\ClientController@store              | api,cors,jwt.auth |
|        | GET|HEAD  | api/client/list/{consultant_id}    | client.index       | App\Http\Controllers\Api\ClientController@index              | api,cors,jwt.auth |
|        | PUT       | api/client/{client_id}             | client.update      | App\Http\Controllers\Api\ClientController@update             | api,cors,jwt.auth |
|        | GET|HEAD  | api/client/{client_id}             | client.show        | App\Http\Controllers\Api\ClientController@show               | api,cors,jwt.auth |
|        | DELETE    | api/client/{client_id}             | client.destroy     | App\Http\Controllers\Api\ClientController@destroy            | api,cors,jwt.auth |
|        | POST      | api/consultant                     | consultant.store   | App\Http\Controllers\Api\ConsultantController@store          | api,cors,jwt.auth |
|        | GET|HEAD  | api/consultant                     | consultant.index   | App\Http\Controllers\Api\ConsultantController@index          | api,cors,jwt.auth |
|        | PUT|PATCH | api/consultant/{consultant}        | consultant.update  | App\Http\Controllers\Api\ConsultantController@update         | api,cors,jwt.auth |
|        | DELETE    | api/consultant/{consultant}        | consultant.destroy | App\Http\Controllers\Api\ConsultantController@destroy        | api,cors,jwt.auth |
|        | GET|HEAD  | api/consultant/{consultant}        | consultant.show    | App\Http\Controllers\Api\ConsultantController@show           | api,cors,jwt.auth |
|        | POST      | api/product                        | product.store      | App\Http\Controllers\Api\ProductController@store             | api,cors,jwt.auth |
|        | GET|HEAD  | api/product/list/{consultant_id}   | product.index      | App\Http\Controllers\Api\ProductController@index             | api,cors,jwt.auth |
|        | GET|HEAD  | api/product/{product_id}           | product.show       | App\Http\Controllers\Api\ProductController@show              | api,cors,jwt.auth |
|        | PUT       | api/product/{product_id}           | product.update     | App\Http\Controllers\Api\ProductController@update            | api,cors,jwt.auth |
|        | DELETE    | api/product/{product_id}           | product.destroy    | App\Http\Controllers\Api\ProductController@destroy           | api,cors,jwt.auth |
|        | GET|HEAD  | api/token/refresh                  |                    | App\Http\Controllers\Api\AuthController@refreshToken         | api,cors,jwt.auth |
|        | GET|HEAD  | home                               | home               | App\Http\Controllers\HomeController@index                    | web,auth          |
+--------+-----------+------------------------------------+--------------------+--------------------------------------------------------------+-------------------+


