<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;

class App
{

    private static Database $db;

    /**
     * @param Router $router
     * @param array $request
     * @param Config $config
     */
    public function __construct(protected Router $router, protected array $request, protected Config $config)
    {
        static::$db = new Database($config->db ?? []);
    }
    public static function getDb(): Database
    {
        return static::$db;
    }
    public function run(): void
    {
        try{
            echo $this->router->resolve($this->request['uri'], $this->request['method']);;
        }catch(RouteNotFoundException){
            http_response_code(404);

            echo View::make('errors/404');
        }
    }
}