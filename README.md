# BugLogger
Zend Framework 3 module to log Exceptions handled.

# Thanks
This repo was made based on [GMBN implementation](https://github.com/GMBN/LogBug) of a module to work with handled Exceptions.

# Configuration

## BugLogger\config\module.config.php

```php
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
```

# Zend Framework Modules
This application was tested into a recent installed [ZendSkeletonApplication](https://github.com/zendframework/ZendSkeletonApplication) so it uses the default MVC components. 

Specific modules used:
 - [zend-db](https://github.com/zendframework/zend-db)
 - [zend-eventmanager](https://github.com/zendframework/zend-eventmanager)
 - [zend-servicemanager-di](https://github.com/zendframework/zend-servicemanager-di)
 
# Database

There is a table dump inside __docs__ folder. The default database's name is __Logger__.