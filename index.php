<?php

require './vendor/autoload.php';
require './functions.php';
require './dbconnect.php';
require './config.php';
require './dispatcher.php';

require './classes/mansion.php';
require './classes/post.php';

require './controllers/controller.php';
require './controllers/mansion.php';
require './controllers/post.php';
require './controllers/admin/admin.php';
require './controllers/admin/mansion.php';
require './controllers/admin/post.php';

date_default_timezone_set("Asia/Tokyo");

session_start();
$toast_msg = $_SESSION["toast_msg"] ?? null;
unset($_SESSION["toast_msg"]);

$err_meg = $_SESSION["err_msg"] ?? null;
unset($_SESSION["err_msg"]);

$pageTitle = "";

# 見せかけのHTTPメソッド有効化
$useExtMethod = $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method']);
$httpMethod = $useExtMethod ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        require_once './404.php';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo "405 method not allowed<br>";
        echo var_dump($allowedMethods);
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        if (!empty($vars)) {
            echo $handler($vars);
        } else {
            echo $handler();
        }
        break;
}

?>