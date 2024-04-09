<?php

require './vendor/autoload.php';
require './functions.php';
require './dbconnect.php';
require './config.php';

require './controllers/public.php';
require './controllers/admin.php';

date_default_timezone_set("Asia/Tokyo");

session_start();
$toast_msg = $_SESSION["toast_msg"] ?? null;
unset($_SESSION["toast_msg"]);

$err_meg = $_SESSION["err_msg"] ?? null;
unset($_SESSION["err_msg"]);

$pageTitle = "";

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'index');
    $r->addRoute('GET', '/contact', 'contact_get');
    $r->addRoute('POST', '/contact', 'contact_post');
    $r->addRoute('GET', '/form', 'form_get');
    // $r->addRoute('POST', '/form', 'form_post');
    $r->addRoute('GET', '/survey', 'survey_get');
    // $r->addRoute('POST', '/survey', 'survey_post');
    $r->addRoute('GET', '/privacy-policy', 'privacy_policy');

    $r->addRoute('GET', '/mansions', 'mansions_index');
    $r->addRoute('GET', '/mansions/{id:\d+}', 'mansions_show');

    $r->addGroup('/admin', function ($r) {
        $r->addRoute('GET', '/login', 'admin_login_get');
        $r->addRoute('POST', '/login', 'admin_login_post');
        $r->addRoute('POST', '/logout', 'admin_logout');
        $r->addRoute('GET', '/mansions', 'admin_mansions_index');
        $r->addRoute('GET', '/mansions/create', 'admin_mansions_create');
        $r->addRoute('POST', '/mansions', 'admin_mansions_store');
        $r->addRoute('GET', '/mansions/{id:\d+}/edit', 'admin_mansions_edit');
        $r->addRoute('PUT', '/mansions/{id:\d+}', 'admin_mansions_update');
        $r->addRoute('DELETE', '/mansions/{id:\d+}', 'admin_mansions_delete');
    });
});

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