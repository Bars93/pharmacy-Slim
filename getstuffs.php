<?php
require_once 'vendor/autoload.php';
$app = new \Slim\Slim(
    array(
        'templates.path' => 'templates',
        'view' => new \Slim\Views\Twig()
    ));
$view = $app->view();
$view->parserOptions = array(
    'debug' => true,
    'cache' => '/templates/cache'
);
$view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
);
unset($view);
$app->setName("Pharmacy");