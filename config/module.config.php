<?php
return array(
    'service_manager' => array(
        'factories' => array(
            \Zend\Db\Adapter\Adapter::class => \Zend\Db\Adapter\AdapterServiceFactory::class,
        ),
        'abstract_factories' => array(
            'Zend\Db\Adapter\AdapterAbstractServiceFactory',
        ),
    ),
    'db' => array(
        'adapters' => array(
            'logAdapter' => array(
                'driver'         => 'Pdo',
                'dsn'            => 'mysql:dbname=Logger;host=172.17.0.2',
                'username'       => 'YOURUSERNAME',
                'password'       => 'YOURPASSWORD',

                'driver_options' => array(
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
                ),
            ),
        )
    ),
    "logbug" => array(
        'ignore' => array(
            'code'=> array(
                '403'
            )
        )
    )
);
