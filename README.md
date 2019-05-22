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

Use php artisan route:list to check the routes.
