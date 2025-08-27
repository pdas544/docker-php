<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Router;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase{


    public function test_it_registers_a_route(){
        /**
            follow the following approach:
         * given-> when -> then
         */
        //given a router object
        $router = new Router();

        //when we call a register method
        $router->register('GET', '/users', ['Users','index']);

        $expected = [
            'GET' => [
                '/users' => ['Users','index']

            ]
        ];
        //then we assert route was registered
        $this->assertEquals($expected, $router->routes());
    }
}