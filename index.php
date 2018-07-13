<?php

namespace Project;

use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Project\Controller\IndexController;
use Project\Module\Database\Types\NameType;
use Project\Utilities\Tools;

\define('ROOT_PATH', getcwd());

require ROOT_PATH . '/vendor/autoload.php';

$route = 'index';

if (Tools::getValue('route') !== false) {
    $route = Tools::getValue('route');
}

Type::addType('Name', NameType::class);

$configuration = new Configuration();

$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/src'], true);
$databaseConfiguration = $configuration->getEntryByName('doctrineDatabase');
$em = EntityManager::create($databaseConfiguration, $config);

Configuration::setEntityManager($em);


try {
    $routing = new Routing($configuration);
    $routing->startRoute($route);
} catch (\InvalidArgumentException $error) {
    $indexController = new IndexController($configuration, $route);
    try {
        $indexController->errorPageAction();
    } catch (\Twig_Error_Loader | \Twig_Error_Runtime | \Twig_Error_Syntax $e) {
        echo 'There is something wrong!';
        exit;
    }
}