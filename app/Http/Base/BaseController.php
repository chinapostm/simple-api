<?php

namespace App\Http\Base;

use SimpleApi\Http\Controller;

class BaseController extends Controller
{
    // 请求方法执行前事件
    public function onRequest(?string $action, ?string $path): bool
    {
        return true;
    }

    // 请求方法执行后事件
    public function afterRequest()
    {
    }
}
