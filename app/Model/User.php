<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // 定义关联的表名, 默认为模型名+s (users)
    protected $table = 'user';

    // 定义主键字段名, 默认为id
    protected $primaryKey = 'id ';
    // 定义字段白名单, 允许操作表中的哪些字段
    protected $fillable = [];
    // 定义字段黑名单, 不允许操作表中哪些字段
    protected $guarded = [];
    // 1、使用model::create([])等方法直接对orm对象操作使, 必须定义$guarded或者$fillable
    // 2、使用$m = new model();然后$m->save()的方式不需要定义
    // 3、简便的方式就是定义$fillable = [];
    // 定义隐藏的字段
    protected $hidden = [];

    // 定义是否默认维护时间, 默认是true
    protected $timestamp = false;
    // 定义数据行创建时间和修改时间的字段名称。默认为created_at、updated_at, 没有设null
    const CREATED_AT = 'created';
    const UPDATED_AT = null;
    // 定义时间格式, 默认为datetime格式, 'U'是int(10)
    protected $dateFormat = 'U';
}
