<?php
$DIR_BASE_CORE = dirname(__DIR__);
define('DIR_BASE', dirname($DIR_BASE_CORE));

require $DIR_BASE_CORE . '/bootstrap/configure.php';
require $DIR_BASE_CORE . '/bootstrap/autoload.php';
$cms = require $DIR_BASE_CORE . '/bootstrap/start.php';

/* @var $cms \Concrete\Core\Application\Application */
if (!$cms->isRunThroughCommandLineInterface()) {
    return;
}

$app = new \Concrete\Core\Console\Application();
$cms->instance('console', $app);
$cms->setupPackages();
$app->setupDefaultCommands();
$app->run();
