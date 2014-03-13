<?php
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
$app->setName("Pharmacy");
$app->get(
    '/',
    function () {
       /*INFO: Минификация позволяет создавать HTML код 1) меньший по размеру (кэп),
       * 2) Редактируемый в PHP - т.е., а) Код по факту однострочный и его можно сохранить в переменную (с переносами строк - нельзя
        * б) Позволяет выбирать код исходя из динамических условий (строки легко конкатенируются)
        * URL сайта минификации (не настаиваю на конкретном, но не все удаляют переносы строк):
        * http://www.textfixer.com/html/compress-html-compression.php
        * 14.03.2014 @ Irbis
        * P.S> А возможно нужно использовать $app->render, а в качестве view render - Twig, например (шаблонизатор).*/
        $exp_code = '<!DOCTYPE html><html lang="ru"><head> <title>Аптека 42</title> <meta charset="UTF-8"> <script type="text/javascript" src="lib/jQuery/jquery-1.10.2.js"></script> <script type="text/javascript" src="lib/Bootstrap/bootstrap.js"></script> <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> <link rel="stylesheet" type="text/css" href="css/common.css"></head><body><div class="row"> <div class="col-md-5 col-md-offset-7"> <form action="/stuffs" method="POST"> <div class="text-center loghead">Вход для сотрудников</div> <div class="controls-row"> <input type="text" name="loginp" class="input-small" placeholder="Логин"> <input type="password" name="passinp" class="input-small" placeholder="Пароль"> <input type="submit" class="btn btn-primary logbtn" tabindex="8" name="logbtn" value="Вход"> <input type="button" onclick="location.href=\'/stuffs/add\'" class="btn btn-primary" value="Регистрация"> </div> </form> </div></div><div class="row"> <div class="col-md-4 col-md-offset-4"> <div class="text-center logo"> <a href="/"><img src="img/logo.png" width="400"></a> </div> </div></div><div class="row"> <div class="col-md-6 col-md-offset-3 menu"> <div class="text-center"> <nav class="navbar navbar-default" role="navigation"> <div class="container-fluid"> <!-- Brand and toggle get grouped for better mobile display --> <!-- Collect the nav links, forms, and other content for toggling --> <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> <ul class="nav navbar-nav"> <li><a href="/drugs">Лекарства</a></li> <li><a href="/staffs">Сотрудники</a></li> <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Заказы <b class="caret"></b></a> <ul class="dropdown-menu"> <li><a href="/orders/add">Приём заказа</a></li> <li><a href="/orders">Список заказов</a></li> </ul> </li> </ul> <form class="navbar-form navbar-left" role="search"> <div class="form-group"> <input type="text" class="form-control" placeholder="Поиск..."> </div> <button type="submit" class="btn btn-sm">Искать</button> </form> </div> <!-- /.navbar-collapse --> </div> <!-- /.container-fluid --> </nav> </div> </div></div></body></html>';

        echo $exp_code;
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