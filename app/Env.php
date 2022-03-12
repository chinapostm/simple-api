<?php

namespace App;

class Env
{
    // Site Info
    const SITE_NAME = 'demo';
    const SITE_ENAME = 'demo';
    const SITE_DOMAIN = 'www.demo.com';
    const SITE_VERSION = 1.0;

    // Mysql Main Node
    const DB_HOST = '127.0.0.1';
    const DB_PORT = 3306;
    const DB_DATABASE = 'demo';
    const DB_USERNAME = 'demo';
    const DB_PASSWORD = 'demo';
    const DB_TIME_OUT = 15;

    // Redis Main Node
    const REDIS_HOST = '127.0.0.1';
    const REDIS_PORT = 6379;
    const REDIS_PASSWORD = 'demo';

    // JWT Token
    const JWT_KEY = 'demo';

    // SM KEY
    const SM_4 = 'demo';
}
