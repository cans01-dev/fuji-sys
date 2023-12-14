<?php

require './vendor/autoload.php';
require './functions.php';
require './classes/mypdo.php';

try {
  $dsn = 'mysql:dbname=fuji-sys;host=localhost';
  $user = 'root';
  $password = '';
  $MyPDO = new MyPDO($dsn, $user, $password);

} catch (PDOException $e) {
  $err_msg = $e->getMessage();
  exit($err_msg);
}

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'index');
    $r->addRoute('GET', '/contact', 'contact');
    $r->addRoute('GET', '/privacy-policy', 'privacy_policy');

    $r->addRoute('GET', '/mansions', 'mansion_index');
    $r->addRoute('GET', '/mansions/{id:\d+}', 'mansion_show');

    $r->addGroup('/admin', function ($r) {
        $r->addRoute('GET', '/', 'admin_index');
        $r->addRoute('GET', '/mansions', 'admin_mansions_index');
        $r->addRoute('GET', '/mansions/create', 'admin_mansions_create');
        $r->addRoute('POST', '/mansions', 'admin_mansions_store');
        $r->addRoute('GET', '/mansions/{id:\d+}', 'admin_mansions_show');
        $r->addRoute('GET', '/mansions/{id:\d+}/edit', 'admin_mansions_edit');
        $r->addRoute('PUT', '/mansions/{id:\d+}', 'admin_mansions_update');
        $r->addRoute('DELETE', '/mansions/{id:\d+}', 'admin_mansions_delete');
    });
    
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
    global $MyPDO;
    
    $limit = $_GET["limit"] ?? 20;
    $page = $_GET["page"] ?? 1;
    $order = $_GET["order"] ?? 'latest';
    $address = $_GET["address"] ?? null;
    $freeword = $_GET["freeword"] ?? null;

    $mansions_count = $MyPDO->getMansions($address, $freeword, count: true);
    $pgnt = get_page_numbers($limit, $mansions_count, $page);
    $offset = $pgnt["offset"];
    
    $mansions = $MyPDO->getMansions($address, $freeword, $order, $limit, $offset);
    $pgnt_stmt = "{$mansions_count}件中{$pgnt["current_start"]}～{$pgnt["current_end"]}件を表示";
    
    require_once 'pages/mansion_index.php';
}

function mansion_show($vars) {
    global $MyPDO;
    $mansion_id = $vars["id"];
    if (!$mansion = $MyPDO->query("SELECT * FROM mansions WHERE id = $mansion_id")->fetch()) {
        echo '404 not found';
        return;
    }
    $mansion = new Mansion($mansion);
    
    require_once 'pages/mansion_show.php';
}

// admin
function admin_index() {
    require_once 'pages/admin/index.php';
}

function admin_mansion_index() {


    require_once 'pages/admin/mansion_index.php';
}

function admin_mansion_create() {
    require_once 'pages/admin/mansion_create.php';
}

function admin_mansion_store() {
    require_once 'pages/admin/mansion_store.php';
}

function admin_mansion_show() {
    require_once 'pages/admin/mansion_show.php';
}

function admin_mansion_edit() {
    require_once 'pages/admin/mansion_edit.php';
}

function admin_mansion_update() {
    require_once 'pages/admin/mansion_update.php';
}

function admin_mansion_delete() {
    require_once 'pages/admin/mansion_delete.php';
}

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