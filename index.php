<?php
/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Slim\Slim();

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */

// GET route
$app->get(
    '/',
    function () {
        $template = <<< ENOT
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Аптека 42</title>
    <meta charset="UTF-8">
    <script type="text/javascript" src="lib/jQuery/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="lib/Bootstrap/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
</head>
<body>
<div class="row">
    <div class="col-md-4 col-md-offset-8">
        <form action="/users" method="POST">
            <div class="controls-row">
                <input type="text" name="loginp" class="input-small" placeholder="Логин">
                <input type="password" name="passinp" class="input-small" placeholder="Пароль">
                <input type="submit" class="btn btn-primary logbtn" tabindex="8" name="logbtn" value="Вход">
            </div>
            <div class="container regblock">
                <a href="/users/add">Регистрация</a>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="text-center">
            <a href="/"><img src="img/logo.png" width="500" height="250"> </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3 menu">

        <div class="text-center">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->


                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="/drug">Лекарства</a></li>
                            <li><a href="/staff">Сотрудники</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Заказы <b
                                        class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Приём заказа</a></li>
                                    <li><a href="#">Список заказов</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-sm">Submit</button>
                        </form>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
    </div>
</div>
</body>
</html>
ENOT;

        echo $template;
    }
);

// POST route
$app->get(
    '/users/:id',
    function ($id) {
        echo "Hello, ID - $id!";
    }
);
$app->post('/users', function() use ($app) {
 echo "You have send login - ".$app->request->post("loginp").", password - ".$app->request->post("passinp");
});
/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
