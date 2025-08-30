<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Exceptions\RouteNotFoundException;
use App\Router;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase{

    protected Router $router;
    public function setUp(): void
    {
        parent::setUp();
        $this->router = new Router();
    }


    public function test_it_registers_a_route(){
        /**
            follow the following approach:
         * given-> when -> then
         */
        //given a router object in the setup method


        //when we call a register method
        $this->router->register('GET', '/users', ['Users','index']);

        $expected = [
            'GET' => [
                '/users' => ['Users','index']

            ]
        ];
        //then we assert route was registered
        $this->assertEquals($expected, $this->router->routes());
    }
    public function test_it_registers_a_get_route(){

        $this->router->get('/users', ['Users','index']);
        $expected = [
            'get' => [
                '/users' => ['Users','index']
            ]
        ];
        $this->assertEquals($expected, $this->router->routes());
    }

    public function test_it_registers_a_post_route(){

        $this->router->post('/users', ['Users','store']);
        $expected = [
            'post' => [
                '/users' => ['Users','store']
            ]
        ];
        $this->assertEquals($expected, $this->router->routes());
    }

    public function test_no_routes_on_init(){
        $router = new Router();
        $this->assertEmpty($router->routes());
    }

    #[DataProvider('routeProvider')]
    public function test_it_throws_route_not_found_exception(string $requestUri, string $requestMethod): void{
        $users  = new class(){
            public function delete():bool{
                return true;
            }
        };

        $this->router->get('/users', [$users::class,'index']);
        $this->router->post('/users', ['Users','store']);
        $this->expectException(RouteNotFoundException::class);
        $this->router->resolve($requestUri,$requestMethod);
    }

    public static function routeProvider(): array{
        return [
            ['/users', 'PUT'],
            ['/invoices', 'POST'],
            ['/users', 'GET'],
            ['/users', 'POST'],
        ];
    }
}