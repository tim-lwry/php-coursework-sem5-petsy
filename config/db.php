<?php

return [
    'class' => 'yii\db\Connection',
    //'dsn' => 'mysql:host=db;dbname=petsy', //localhost:3306 //db
    'dsn' => 'mysql:host=localhost:3306;dbname=petsy',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
