<?php

use \Nette\Application\Routers\Route;

define('LIBS_DIR', __DIR__ . '/../libs');
define('APP_DIR', __DIR__ . '/../app');
define('TMP_DIR', __DIR__ . '/../temp');

require_once LIBS_DIR . '/Nette/loader.php';


\Nette\Diagnostics\Debugger::enable(false);
\Nette\Diagnostics\Debugger::$strictMode = true;

$configurator = new Nette\Config\Configurator;
$configurator->setCacheDirectory(__DIR__ . '/../temp');


$configurator->createRobotLoader()
        ->addDirectory(APP_DIR)
        ->addDirectory(LIBS_DIR)
        ->register();

$configurator->addConfig(__DIR__ . '/config/config.neon');
$container = $configurator->createContainer();

$router = $container->router;
$router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
