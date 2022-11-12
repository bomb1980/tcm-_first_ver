<?php

use Illuminate\Support\Str;

return [

    'default' => env('DB_CONNECTION', 'oracle'),

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'db_ooap_old'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'oracle' => [
            'driver'        => 'oracle',
            'tns' => env('SID', '( DESCRIPTION =
            (ADDRESS = (PROTOCOL = TCP)(HOST = 20.64.0.139)(PORT = 1521))
            (CONNECT_DATA =(SERVICE_NAME=molorclpdb)))'),
            'host'          => env('DB_HOST_ORA', '20.64.0.139'),
            'port'          => env('DB_PORT_ORA', '1521'),
            'database'      => env('DB_DATABASE_ORA', 'molorclpdb'),
            'username'      => env('DB_USERNAME_ORA', 'OOAP_PRD'),
            'password'      => env('DB_PASSWORD_ORA', 'OOAP_PRD@tcm2022'),
            'charset'       => env('DB_CHARSET', 'AL32UTF8'),
            'prefix'        => env('DB_PREFIX', ''),
            'prefix_schema' => env('DB_SCHEMA_PREFIX', ''),
            'edition'       => env('DB_EDITION', 'ora$base'),
        ],

        'oracletcm' => [
            'driver'        => 'oracle',
            'tns' => env('SID', '( DESCRIPTION =
            (ADDRESS = (PROTOCOL = TCP)(HOST = 116.204.182.50)(PORT = 1521))
            (CONNECT_DATA =(SERVICE_NAME=XEPDB1)))'),
            'host'          => env('DB_HOST_ORA', '116.204.182.50'),
            'port'          => env('DB_PORT_ORA', '1521'),
            'database'      => env('DB_DATABASE_ORA', 'XEPDB1'),
            'username'      => env('DB_USERNAME_ORA', 'OOAP'),
            'password'      => env('DB_PASSWORD_ORA', 'OOAP_test'),
            'charset'       => env('DB_CHARSET', 'AL32UTF8'),
            'prefix'        => env('DB_PREFIX', ''),
            'prefix_schema' => env('DB_SCHEMA_PREFIX', ''),
            'edition'       => env('DB_EDITION', 'ora$base'),
        ],

        'oracle_db_dpis' => [
            'driver'        => 'oracle',
            'tns' => env('SID', '( DESCRIPTION =
            (ADDRESS = (PROTOCOL = TCP)(HOST = 20.64.0.236)(PORT = 1521))
            (CONNECT_DATA =(SERVICE_NAME=dpis)))'),
            'host'          => env('DB_HOST_ORA', '20.64.0.236'),
            'port'          => env('DB_PORT_ORA', '1521'),
            'database'      => env('DB_DATABASE_ORA', 'dpis'),
            'username'      => env('DB_USERNAME_ORA', 'TCM_DPIS'),
            'password'      => env('DB_PASSWORD_ORA', 'password'),
            'charset'       => env('DB_CHARSET', 'AL32UTF8'),
            'prefix'        => env('DB_PREFIX', ''),
            'prefix_schema' => env('DB_SCHEMA_PREFIX', ''),
            'edition'       => env('DB_EDITION', 'ora$base'),
        ],

        'oracle_umts' => [
            'driver'    => 'oracle',
            'tns' => env('SID', '( DESCRIPTION =
            (ADDRESS = (PROTOCOL = TCP)(HOST = 116.204.182.50)(PORT = 1521))
            (CONNECT_DATA =(SERVICE_NAME=XEPDB1)))'),
            'host'      =>  '116.204.182.50',
            'port'      =>  '1521',
            'database'  =>  'XEPDB1',
            'username'  =>  'UMTS',
            'password'  =>  'UMTS_test',
            'charset'       => 'AL32UTF8',
            'prefix'        => '',
            'prefix_schema' =>  '',
            'edition'       => 'ora$base',
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

    ],

    'migrations' => 'migrations',


    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_') . '_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
