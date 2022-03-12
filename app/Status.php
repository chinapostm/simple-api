<?php

namespace App;

class Status
{
    private static $msg = [
        0 => 'success',
        400 => 'BadRequest',
        401 => 'Authentication failed',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Insufficient permissions',
        422 => 'Unprocessable Entity'
    ];

    static function getMsg(int $code): ?string
    {
        if (isset(self::$msg[$code])) {
            return self::$msg[$code];
        } else {
            return null;
        }
    }
}
