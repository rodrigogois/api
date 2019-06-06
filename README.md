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

## Funcionalidade de cliente

#### Cadastrar cliente

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

> `url:` localhost:8000/api/Client

> `verbo http:` GET 

> `parâmetros:` Não Possui

## Obter um clientes por id

> `url:` localhost:8000/api/Client/{id}

> `verbo http:` GET 

> `parâmetros:` client_id (url)

## Editar cliente

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


