# Simple PHP MVC Project  - PHP 8.3 MVC, ORM, Routing (simple, without using any ready-made libraries)

## Description

It was coded simply from scratch, without using any libraries. MVC design pattern structure was prepared. Coded a simple, extensible chained ORM logic. A very simple and understandable routing structure was created. It is a simple project written in just a few hours, for the purpose of improving myself and remembering. Someone can change it to their own liking and work quickly.

## Getting Started

* Folder and autoload structure in accordance with PSR-4 standards.
* Database settings are kept in the .env file. (additional settings can be made. There is a class that reads the .env file)
* PDO is used as the database driver.
* Established a simple sample chained ORM structure (extensible)
* It is okay if you do not write the table name in every query. It selects the table according to the name of the controller or model on which the operation is performed. If the name is the same as the table.
* Rules were determined for encapsulation on models.
* The entire structure was written with namespaces. Therefore, calling and using Models and Controller is quite simple because they are all loaded automatically.
* View folder structure was created under different folders to avoid complexity.
* Controller is free to use even if the model is not called.
* To convert a class into a controller or model, it is sufficient to derive it from the base classes.
* Calling view and sending data is simple.
* It is enough to call the Model to get the data from the database. It is possible to get data from upper classes without calling the model.
* Routing structure is quite simple and useful. There is method control and Default URI patterns are available. Extensible.

### Installing

* You just need to connect it to your own database using the .env file :-)

### Executing program

* Example routing structures

```
Route::run('/', 'home@index', 'get');

Route::run('/team', 'team@index');
Route::run('/team/position/{id}', 'team@getPosition');

Route::run('/services', 'services@index');
Route::run('/services/{slug}', 'services@getService');

Route::run('/user/register', 'user@register', 'post');
```

* Required to create a Controller. An empty Controller structure

```
namespace App\Controllers;

use App\Core\Base\Controller;

class HomeController extends Controller
{
    public function indexAction(){
       $this->view('index');
    }
}
```

* Required to create a Model. An empty Model structure

```
namespace App\Models;

use App\Core\Base\Model;

class Services extends Model
{
    
}
```

* A simple ORM structure

```
 $teamModel = new Team();
$teamData  = $teamModel
    ->Columns("*")
    ->getAll();

-----------------------

$servicesModel = new Services();
$servicesData  = $servicesModel
    ->From("services")
    ->Columns("id,title,slug")
    ->Where("slug = ".$slug)
    ->Find();
```

* A simple view structure and sending data to the view

```
$this->view('getservice', [
            "services"  => $servicesData,
            "teams"     => $teamData,
            "community" => $communityData
        ]);
```

* A simple URI pattern for the routing structure

```
[
    '{slug}' => '([0-9a-zA-Z-]+)',
    '{id}' => '([0-9]+)'
]
```

* Sending response status and messages for faulty request methods using the Exception class.

```
HttpRequestMethods::MethodNotAllowed("POST", "405 Method Not Allowed");
```
* Simple and understandable folder structure

![image](https://github.com/kamrankarimov/php-mvc-orm-routing-simple-project/assets/11867154/709b72b4-f6a5-4bda-b97c-006419097bd7) ![image](https://github.com/kamrankarimov/php-mvc-orm-routing-simple-project/assets/11867154/bf0fdeae-dd0f-4a10-b96a-93f4377f392a) ![image](https://github.com/kamrankarimov/php-mvc-orm-routing-simple-project/assets/11867154/3189e613-9987-4c2e-aeeb-62de9281f179)

* Includes components for demo

![image](https://github.com/kamrankarimov/php-mvc-orm-routing-simple-project/assets/11867154/f63faf47-b4cd-417a-9608-ae43468743b3)


## Authors

Kamran Karimov

