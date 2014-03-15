<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
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
$app->get(
    '/',
    function () use ($app) {
       /*INFO: Минификация позволяет создавать HTML код 1) меньший по размеру (кэп),
       * 2) Редактируемый в PHP - т.е., а) Код по факту однострочный и его можно сохранить в переменную (с переносами строк - нельзя
        * б) Позволяет выбирать код исходя из динамических условий (строки легко конкатенируются)
        * URL сайта минификации (не настаиваю на конкретном, но не все удаляют переносы строк):
        * http://www.textfixer.com/html/compress-html-compression.php
        * 14.03.2014 @ Irbis
        * P.S> А возможно нужно использовать $app->render, а в качестве view render - Twig, например (шаблонизатор).*/

        $app->render('main.tpl.html',array('subtitle' => 'Главная страница'));
    }
);
$app->get('/stuffs',function() use ($app){

});
$app->get('/stuffs/:id',function($id) use ($app){

});
// POST route
$app->get(
    '/stuffs/:id',
    function ($id) {
        echo "Hello, ID - $id!";
    }
);
$app->post('/stuffs', function () use ($app) {
// echo "You have send login - ".$app->request->post("loginp").", password - ".$app->request->post("passinp");
    define('SALT',"Look around");
    $ulog = $app->request->post("loginp");
    $upass = $app->request->post("passinp");

    /*
  * TODO: verify login and password, write to SESSION authentification data, referer to back page
  * */
    $app->response->redirect($_SERVER['HTTP_REFERER'],200);
});
$app->get('/stuffs',function() use ($app) {
    echo "LOL";
});
$app->run();