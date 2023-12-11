<?php 
require 'vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'index');
    $r->addRoute('GET', '/contact', 'contact');
    $r->addRoute('GET', '/privacy-policy', 'privacy_policy');

    $r->addRoute('GET', '/mansion', 'mansion_index');
    $r->addRoute('GET', '/mansion/{id:\d+}', 'mansion_show');
    
    $r->addRoute('POST', '/api/contact', 'contact_send');
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 not found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo '405 method not allowed';
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

// page
function index() {
    require_once 'pages/top.php';
}

function contact() {
    require_once 'pages/contact.php';
}

function privacy_policy() {
    require_once 'pages/privacy_policy.php';
}

function mansion_index() {
    require_once 'pages/mansion_index.php';
}

function mansion_show() {
    require_once 'pages/mansion_show.php';
}

// admin


// API
function contact_send() {
    $my_POST = json_decode(file_get_contents('php://input'), true);
    
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    $to = "o.yamaneko0331@gmail.com";
    $subject = "TEST";
    $headers = "Content-Type: text/plain; charset=utf-8 \n";
    $headers .= "Content-Transfer-Encoding: BASE64 \n";
    $smarty = new Smarty();
    $smarty->setTemplateDir('assets/smarty/template/');
    $smarty->setCompileDir('assets/smarty/template_c/');
    $smarty->assign($my_POST);

    $body = $smarty->fetch('mail.tpl');
    
    // return $body;
    return mb_send_mail($to, $subject, $body, $headers);
}

?>