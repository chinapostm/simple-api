<?php

namespace App\Http\Controller;

use App\Http\Base\BaseController;
use App\Model\User;
use SimpleApi\Http\{Request, Response};

class Test extends BaseController
{
    /**
     * 测试
     * @Method(allow={GET})
     */
    public function index()
    {
        // 获取参数
        $Param = Request::get();

        // 查询数据
        $data = User::where(['id' => $Param['id']])->get();

        return Response::respond($data);
    }
}
