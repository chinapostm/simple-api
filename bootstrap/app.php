<?php

use Illuminate\Database\Capsule\Manager;
use SimpleApi\Http\Response;

use function FastRoute\cachedDispatcher;

class app
{
    public function run()
    {
        // 加载基础配置
        // 加载数据库ORM
        $dbManager = new Manager();
        $dbManager->addConnection(require APP_PATH . 'config' . APP_DS . 'database.php');
        $dbManager->bootEloquent();
        // 加载路由
        self::router();
    }

    public static function router()
    {
        // 路由缓存配置
        $cacheConfig = ['cacheFile' => APP_PATH . 'temp' . APP_DS . 'route.cache', 'cacheDisabled' => true];
        // 初始化路由
        $dispatcher = cachedDispatcher('App\Http\Controller\Router::rules', $cacheConfig);

        // 获取请求和URI
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // 去除URI请求参数
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $path = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $path);

        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                // 没有找到路由
                exit(Response::fail('Not Found', 404, 404));
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                // Method方法不正确
                exit(Response::fail('Method Not Allowed', 405, 405));
                break;
            case \FastRoute\Dispatcher::FOUND:
                // 正常匹配
                list($class, $action) = $routeInfo[1];
                $vars = $routeInfo[2];
                try {
                    // 实例化控制器
                    $Controller = new $class;
                    // 调用请求方法前
                    $onRequest = $Controller->onRequest($action, $path);
                    // 如果调用请求方法前的回调事件返回结果为true时继续执行
                    if ($onRequest) {
                        // 调用请求方法
                        $Controller->$action($vars);
                        // 调用请求方法后
                        exit($Controller->afterRequest());
                    }
                    // call_user_func([new $class, $action], $vars);
                } catch (\Throwable $th) {
                    throw new \ErrorException('路由错误! 请检查路由是否正确!');
                }
                break;
        }
    }
}
