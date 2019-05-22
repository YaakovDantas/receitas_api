# receitas_api
A simple CRUD of 'Receita' with Laravel and InfyOm, only logged users are able to CRUD the 'Receita'

Clone the Project

use php artisan db:seed

to create 2 users:
  'email' => 'teste@email'
  'password' => 'senha'
  
  'email' => 'teste2@email'
  'password' => 'senha'
  
and generate 4 Receitas, 2 for each user.

after that, send a post request to localhost:8000/api/login/
and receive the User Token, copy the token and send with Bearer Token

For make CRUD in Receitas, you will need to send the User Token ALWAYS

Below the Route:list

| Domain | Method    | URI                         | Name                 | Action                                                 | Middleware  |
+--------+-----------+-----------------------------+----------------------+--------------------------------------------------------+-------------+
|        | POST      | api/login                   | api.                 | App\Http\Controllers\API\TokenController@gerarToken    | api         |
|        | GET|HEAD  | api/receitas                | api.receitas.index   | App\Http\Controllers\API\ReceitaAPIController@index    | api,my_auth |
|        | POST      | api/receitas                | api.receitas.store   | App\Http\Controllers\API\ReceitaAPIController@store    | api,my_auth |
|        | GET|HEAD  | api/receitas/create         | api.receitas.create  | App\Http\Controllers\API\ReceitaAPIController@create   | api,my_auth |
|        | GET|HEAD  | api/receitas/{receita}      | api.receitas.show    | App\Http\Controllers\API\ReceitaAPIController@show     | api,my_auth |
|        | PUT|PATCH | api/receitas/{receita}      | api.receitas.update  | App\Http\Controllers\API\ReceitaAPIController@update   | api,my_auth |
|        | DELETE    | api/receitas/{receita}      | api.receitas.destroy | App\Http\Controllers\API\ReceitaAPIController@destroy  | api,my_auth |
|        | GET|HEAD  | api/receitas/{receita}/edit | api.receitas.edit    | App\Http\Controllers\API\ReceitaAPIController@edit     | api,my_auth |
|        | GET|HEAD  | api/usuario/receitas        | api.user_receitas    | App\Http\Controllers\API\ReceitaAPIController@listUser | api,my_auth |
+--------+-----------+-----------------------------+----------------------+--------------------------------------------------------+-------------+
