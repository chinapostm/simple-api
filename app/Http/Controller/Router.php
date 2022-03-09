<?php

namespace App\Http\Controller;

class Router
{
    static function rules(\FastRoute\RouteCollector $Route)
    {
        $Route->addRoute('GET', '/test/index', [\App\Http\Controller\Test::class, 'index']);
    }
}
