<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
    'templates.path' => 'templates',
    'view' => new \Slim\Views\Twig(),
    'http.version' => '1.1'
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

        $app->render('main.tpl.html', array('subtitle' => 'Главная страница'));
    }
);
// POST route
$app->get('/staff/:id',
    function ($id) {

    }
)->conditions(array('id' => '\d+'));
$app->post('/staff', function () use ($app) {
    //echo "You have send login - ".$app->request->post("loginp").", password - ".$app->request->post("passinp");
    echo "<br><a href='/'>turn back</a><br><br>";
    define('SALT', "Look around");
    $ulog = $app->request->post("loginp");
    $upass = $app->request->post("passinp");
    $req = $app->request;
    $app->flashNow('error', $ulog . ' ... ' . $upass);
    /*
  * TODO: verify login and password, write to SESSION authentification data, referer to back page
  * */
    //$app->response->redirect($_SERVER['HTTP_REFERER'],200);
});
$app->get('/staff', function () use ($app) {
    echo "LOL";
});
$app->get('/drugs', function () use ($app) {
    echo 'LOL';
});
$app->run();