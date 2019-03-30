<?php

return [
    'class' => yii\db\Connection::class,
    'dsn' => 'pgsql:host=127.0.0.1;port=5432;dbname=yii2_base',
    'username' => 'sanjar',
    'password' => 'password',
    'charset' => 'utf8',
    'tablePrefix' => '',
    'schemaMap' => [
        'pgsql' => [
            'class' => yii\db\pgsql\Schema::class,
            'defaultSchema' => 'public'
        ]
    ]

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
