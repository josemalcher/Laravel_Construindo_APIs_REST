# Laravel: Construindo APIs REST

https://www.udemy.com/course/laravel-construindo-apis-rest/

Conheça os principais conceitos e implementações de sua próxima API REST com Laravel

## <a name="indice">Índice</a>

1. [Seção 1: Módulo 0](#parte1)
2. [Seção 2: WebServices, APIs, REST Conceitos](#parte2)
3. [Seção 3: Mão na Massa: Primeira API REST](#parte3)
4. [Seção 4: Laravel: Recursos para APIs](#parte4)
5. [Seção 5: APIs REST: Filtros](#parte5)
6. [Seção 6: Api REST: Validações](#parte6)
7. [Seção 7: [Projeto] - Configurando Projeto](#parte7)
8. [Seção 8: [Projeto] - Endpoint de Imóveis](#parte8)
9. [Seção 9: Endpoints: /users & /categories](#parte9)
10. [Seção 10: Relacionamento Muitos para Muitos: Categ…](#parte10)
11. [Seção 11: Relacionamento Usuário e Perfil](#parte11)
12. [Seção 12: Imóvel: Upload de Imagens](#parte12)
13. [Seção 13: Conhecendo o JWT (Json Web Token)](#parte13)
14. [Seção 14: Autenticação & JWT em Nossa API de Imó…](#parte14)
15. [Seção 15: Busca de Imóveis](#parte15)
16. [Seção 16: Conclusões](#parte16)
17. [Seção 17: Extra: Migrando Versões Laravel](#parte17)
---


## <a name="parte1">1 - Seção 1: Módulo 0</a>

- 1 Introdução
- 2 Quem sou eu?
- 3 Ambiente & Links Importantes
- 4 Importante - Links

[Voltar ao Índice](#indice)

---


## <a name="parte2">2 - Seção 2: WebServices, APIs, REST Conceitos</a>

- 5 Protocolo HTTP

  - Verbos
    - GET
    - PUT
    - POST
    - PATCH
    - DELET
    - OPTIONS
    - ...

  - Status code
    - 200: success
    - 300: Redirect
    - 400: Client Error
    - 500: Server Error

- 6 O que são WebServices?
 
![Webservices](/img/webservices_1.png)

  - SOAP - WSDL
  - REST
  - RCP
  - GRAPHQL
  
- 7 Webservices X APIs

![API](/img/api_1.png)

- 8 REST: O que é?

![REST](/img/rest_1.png)

![REST](/img/rest_2.png)

![REST](/img/rest_3.png)

- 9 Conhecendo mais o REST por meio do consumo de uma API REST

![](/img/api-rest-1.png)

[Voltar ao Índice](#indice)

---


## <a name="parte3">3 - Seção 3: Mão na Massa: Primeira API REST</a>

- 10 Iniciando API com Laravel

  - [api-01-app](api-01-app)
  - [Revisão - api-03-app](/api-03-app)

- [api-01-app/routes/api.php](api-01-app/routes/api.php)

```php
Route::get('/test', function (Request $request){

    //dd($request->headers->get('Authorization'));
    //dd($request->headers->all());

    $response = new \Illuminate\Http\Response(
        json_encode(['msg' => 'Minha primeira Resposta de API']));
    $response->header('Content-Type', 'application/json');

    return $response;
});

```

- 11 Configurando base para API
 
- 12 Criando Primeiro Endpoint

- 13 Criando & Recuperando Produto

- 14 Atualizando Produto

- 15 Removendo Produto


[Voltar ao Índice](#indice)

---


## <a name="parte4">4 - Seção 4: Laravel: Recursos para APIs</a>

- 16 Introdução

```php
 public function index()
    {
        $products = $this->product->paginate(1);

        return response()->json($products);
    }
```

```json
{
  "current_page": 1,
  "data": [
    {
      "id": 3,
      "name": "Ed Produto0001 Editadp",
      "prive": 59.99,
      "descripption": "Descrição do produto 0001 Editado",
      "slug": "produto0001Editado",
      "created_at": "2021-10-26T15:58:03.000000Z",
      "updated_at": "2021-10-26T16:00:54.000000Z"
    }
  ],
  "first_page_url": "http://localhost/api/products?page=1",
  "from": 1,
  "last_page": 2,
  "last_page_url": "http://localhost/api/products?page=2",
  "links": [
    {
      "url": null,
      "label": "&laquo; Previous",
      "active": false
    },
    {
      "url": "http://localhost/api/products?page=1",
      "label": "1",
      "active": true
    },
    {
      "url": "http://localhost/api/products?page=2",
      "label": "2",
      "active": false
    },
    {
      "url": "http://localhost/api/products?page=2",
      "label": "Next &raquo;",
      "active": false
    }
  ],
  "next_page_url": "http://localhost/api/products?page=2",
  "path": "http://localhost/api/products",
  "per_page": 1,
  "prev_page_url": null,
  "to": 1,
  "total": 2
}
```

- 17 Controllers como Recurso

```
$ php artisan make:controller UserController --resource --api
Controller created successfully.
```

```php
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
```

```
php artisan route:list
+--------+-----------+----------------------+--------------+------------------------------------------------------------+------------+
| Domain | Method    | URI                  | Name         | Action                                                     | Middleware |
+--------+-----------+----------------------+--------------+------------------------------------------------------------+------------+
|        | GET|HEAD  | /                    |              | Closure                                                    | web        |
|        | GET|HEAD  | api/products         |              | App\Http\Controllers\Api\ProductController@index           | api        |
|        | POST      | api/products         |              | App\Http\Controllers\Api\ProductController@save            | api        |
|        | PUT       | api/products         |              | App\Http\Controllers\Api\ProductController@update          | api        |
|        | PATCH     | api/products         |              | App\Http\Controllers\Api\ProductController@update          | api        |
|        | GET|HEAD  | api/products/{id}    |              | App\Http\Controllers\Api\ProductController@show            | api        |
|        | DELETE    | api/products/{id}    |              | App\Http\Controllers\Api\ProductController@delete          | api        |
|        | GET|HEAD  | api/test             |              | Closure                                                    | api        |
|        | GET|HEAD  | api/user             | user.index   | App\Http\Controllers\Api\UserController@index              | api        |
|        | POST      | api/user             | user.store   | App\Http\Controllers\Api\UserController@store              | api        |
|        | GET|HEAD  | api/user/create      | user.create  | App\Http\Controllers\Api\UserController@create             | api        |
|        | GET|HEAD  | api/user/{user}      | user.show    | App\Http\Controllers\Api\UserController@show               | api        |
|        | PUT|PATCH | api/user/{user}      | user.update  | App\Http\Controllers\Api\UserController@update             | api        |
|        | DELETE    | api/user/{user}      | user.destroy | App\Http\Controllers\Api\UserController@destroy            | api        |
|        | GET|HEAD  | api/user/{user}/edit | user.edit    | App\Http\Controllers\Api\UserController@edit               | api        |
|        | GET|HEAD  | sanctum/csrf-cookie  |              | Laravel\Sanctum\Http\Controllers\CsrfCookieController@show | web        |
+--------+-----------+----------------------+--------------+------------------------------------------------------------+------------+


```

```php
    public function index()
    {
        return response()->json(['message'=> __METHOD__]); // testar métodos
    }
```

- 18 Eloquent Api Resource

```
$ php artisan make:resource ProductResource
Resource created successfully.

```

- [api-01-app/app/Http/Resources/ProductResource.php](api-01-app/app/Http/Resources/ProductResource.php)

```php
public function toArray($request)
    {
        // return parent::toArray($request);
        /* return [
            'name' => $this->name,
            'prive'=> $this->prive,
            'slug' => $this->slug
        ]; */
        return $this->resource->toArray();
    }
```

- [api-01-app/app/Http/Controllers/Api/ProductController.php](api-01-app/app/Http/Controllers/Api/ProductController.php)

```php
    public function show($id)
    {
        $product = $this->product->find($id);
        // return response()->json(['message' => __METHOD__]);
        return new ProductResource($product);
    }
```
- 19 Eloquent Api Resource pt. 2

```
$ php artisan make:resource ProductCollection
Resource collection created successfully.

```

![](/img/resource-collection.png)

```php
class ProductController extends Controller
{
    public function index()
    {
        // $products = $this->product->all();
        $products = $this->product->paginate(2);

        //return response()->json($products);
        return new ProductCollection($products);
    }
```

```php
class ProductCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'data' => $this->collection,
            'extra_1' => 'Dado adicional no toArray'
        ];
    }
    public function with(Request $request)
    {
        // return parent::with($request); // TODO: Change the autogenerated stub
        return [
            'extra_information' => 'Another Data',
            'extra_2' => 'Dado adicional'
        ];
    }
}
```

- [api-01-app/app/Providers/AppServiceProvider.php](api-01-app/app/Providers/AppServiceProvider.php)

```php
    public function boot()
    {
        JsonResource::withoutWrapping();
        JsonResource::wrap('view');
    }
}
```

- 20 Autenticação Básica

```
$ php artisan make:seeder UsersTableSeeder
Seeder created successfully.

```

- [api-01-app/database/seeders/UsersTableSeeder.php](api-01-app/database/seeders/UsersTableSeeder.php)

```php
 public function run()
    {
        factory(\App\User::class, 1)->create();
    }
```

- [api-01-app/database/seeders/DatabaseSeeder.php](api-01-app/database/seeders/DatabaseSeeder.php)

```php
 public function run()
    {
         \App\Models\User::factory(10)->create();
    }
```

```
$ php artisan db:seed
Database seeding completed successfully.

```

![](/img/seed-db.png)




[Voltar ao Índice](#indice)

---


## <a name="parte5">5 - Seção 5: APIs REST: Filtros</a>

- 21 Introdução

```
$ php artisan make:factory ProductFactory
Factory created successfully.

$ php artisan make:seeder ProductTableSeeder
Seeder created successfully.

```

- 22 Iniciando Filtragem de Campos

- [api-01-app/app/Http/Controllers/Api/ProductController.php](api-01-app/app/Http/Controllers/Api/ProductController.php)

```php
 public function index(Request $request)
    {
        $products = $this->product;

        if ($request->has('fields')) {
            $field = $request->get('fields');
            $products = $products->selectRaw($field);
        }

        //$products = $this->product->paginate(4);
        //return response()->json($products);
        return new ProductCollection($products->paginate(5));
    }
```

- 23 Adicionando Condições na Filtragem

- [api-01-app/app/Http/Controllers/Api/ProductController.php](api-01-app/app/Http/Controllers/Api/ProductController.php)

```
public function index(Request $request)
    {
        $products = $this->product;

        if ($request->has('conditions')) {
            $expressions = explode(';', $request->get('conditions'));
            foreach ($expressions as $e) {
                $exp = explode('=', $e);
                $products = $products->where($exp[0], $exp[1]);
            }
        }

        if ($request->has('fields')) {
            $fields = $request->get('fields');
            $products = $products->selectRaw($fields);
        }

        //$products = $this->product->paginate(4);
        //return response()->json($products);
        return new ProductCollection($products->paginate(5));
    }
```

- 24 Melhorando Condições nas Filtragens

- [Http/Controllers/Api/ProductController.php](Http/Controllers/Api/ProductController.php)

```php
 public function index(Request $request)
    {
        $products = $this->product;

        if ($request->has('conditions')) {
            $expressions = explode(';', $request->get('conditions'));
            foreach ($expressions as $e) {
                $exp = explode(':', $e);
                $products = $products->where($exp[0], $exp[1], $exp[2]);
            }
        }

        if ($request->has('fields')) {
            $fields = $request->get('fields');
            $products = $products->selectRaw($fields);
        }

        //$products = $this->product->paginate(4);
        //return response()->json($products);
        return new ProductCollection($products->paginate(5));
    }

```

```
http://localhost/api/products?fields=id,name,prive&conditions=name:like:%Produto%
```

- 25 Melhorias nos Filtros Criando Repository

- 26 Melhorias no Repository

- 27 Criando AbstractRepository

```php
class AbstractRepository
{
    /**
     * @var Model
     */
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function selectCoditions($coditions)
    {
        $expressions = explode(';', $coditions);
        foreach($expressions as $e) {
            $exp = explode(':', $e);

            $this->model = $this->model->where($exp[0], $exp[1], $exp[2]);
        }
    }

    public function selectFilter($filters)
    {
        $this->model = $this->model->selectRaw($filters);
    }

    public function getResult()
    {
        return $this->model;
    }
}
```

```php
class ProductRepository extends AbstractRepository
{
}
```

```php
public function index(Request $request)
    {
        $products = $this->product;
        $productRespository = new ProductRepository($products);

        if($request->has('coditions')) {
            $productRespository->selectCoditions($request->get('coditions'));
        }

        if($request->has('fields')) {
            $productRespository->selectFilter($request->get('fields'));
        }

        //return response()->json($products);
        return new ProductCollection($productRespository->getResult()->paginate(10));
    }
```


[Voltar ao Índice](#indice)

---


## <a name="parte6">6 - Seção 6: Api REST: Validações</a>

- 27 - Introdução
- 28 - Iniciando Validações

```
 $sail php artisan make:request ProductRequest    

   INFO  Request [app/Http/Requests/ProductRequest.php] created successfully.

```

```php
class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name'        => 'required',
            'price'       => 'required',
            'description' => 'required',
            'slug'        => 'required'
        ];
    }
```

- 29 - Retornando Validações em JSON
- 30 - Status Code HTTP
- 31 - Conclusões

[Voltar ao Índice](#indice)

---


## <a name="parte7">7 - Seção 7: [Projeto] - Configurando Projeto</a>

- 32 - Conhecendo o Projeto

![img/api_db_mobiliaria.png](img/api_db_mobiliaria.png)

- 33 - Iniciando Projeto MeuImovel

```
curl -s "https://laravel.build/meuImovel?with=mysql" | bash

```

- 34 - Configurando BD & Iniciando Migrations
- 35 - Preparando Migrações das Tabelas
- 36 - Criando Associações & Relacionamentos
- 37 - Tabela Pivot & Executando Migrações, Concluindo Etapa

[Voltar ao Índice](#indice)

---


## <a name="parte8">8 - Seção 8: [Projeto] - Endpoint de Imóveis</a>



[Voltar ao Índice](#indice)

---


## <a name="parte9">9 - Seção 9: Endpoints: /users & /categories</a>



[Voltar ao Índice](#indice)

---


## <a name="parte10">10 - Seção 10: Relacionamento Muitos para Muitos: Categ…</a>



[Voltar ao Índice](#indice)

---


## <a name="parte11">11 - Seção 11: Relacionamento Usuário e Perfil</a>



[Voltar ao Índice](#indice)

---


## <a name="parte12">12 - Seção 12: Imóvel: Upload de Imagens</a>



[Voltar ao Índice](#indice)

---


## <a name="parte13">13 - Seção 13: Conhecendo o JWT (Json Web Token)</a>



[Voltar ao Índice](#indice)

---


## <a name="parte14">14 - Seção 14: Autenticação & JWT em Nossa API de Imó…</a>



[Voltar ao Índice](#indice)

---


## <a name="parte15">15 - Seção 15: Busca de Imóveis</a>



[Voltar ao Índice](#indice)

---


## <a name="parte16">16 - Seção 16: Conclusões</a>



[Voltar ao Índice](#indice)

---


## <a name="parte17">17 - Seção 17: Extra: Migrando Versões Laravel</a>



[Voltar ao Índice](#indice)

---

