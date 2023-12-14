<?php

require './vendor/autoload.php';
require './dbconnect.php';
require './functions.php';

use Carbon\Carbon;
Carbon::setLocale('ja');

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'index');
    $r->addRoute('GET', '/contact', 'contact');
    $r->addRoute('GET', '/privacy-policy', 'privacy_policy');

    $r->addRoute('GET', '/mansions', 'mansion_index');
    $r->addRoute('GET', '/mansions/{id:\d+}', 'mansion_show');
    
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
    global $pdo;
    
    $page = $_GET["page"] ?? 1;
    $limit = $_GET["limit"] ?? 20;
    $order = $_GET["order"] ?? 'latest';

    if ($order == "latest") {
        $order_sql = "ORDER BY created_at";
    } elseif ($order == "price") {
        $order_sql = "ORDER BY unit_price";
    } elseif ($order == "price-desc") {
        $order_sql = "ORDER BY unit_price DESC";
    } else {
        $order_sql = "";
    }
    
    if (isset($_GET["address"]) && !isset($_GET["freeword"])) {
        $where_sql = "WHERE address LIKE '%{$_GET["address"]}%'";
    } elseif (!isset($_GET["address"]) && isset($_GET["freeword"])) {
        $where_sql = "WHERE CONCAT(address, access, IFNULL(note, '')) LIKE '%{$_GET["freeword"]}%'";
    } elseif (isset($_GET["address"]) && isset($_GET["freeword"])) {
        $where_sql = "WHERE address LIKE '%{$_GET["address"]}%' AND CONCAT(address, access, IFNULL(note, '')) LIKE '%{$_GET["freeword"]}%'";
    } else {
        $where_sql = "";
    }

    $mansions_count = $pdo->query("SELECT COUNT(*) FROM mansions $where_sql")->fetchColumn();
    $pgnt = get_page_numbers($limit, $mansions_count, $page);
    $pgnt_stmt = "{$mansions_count}件中{$pgnt["current_start"]}～{$pgnt["current_end"]}件を表示";
    
    $sql = "SELECT * FROM mansions $where_sql $order_sql LIMIT $limit OFFSET {$pgnt["offset"]}";
    $mansions = $pdo->query($sql)->fetchAll();

    // exit($sql);
    
    require_once 'pages/mansion_index.php';
}

function mansion_show($vars) {
    global $pdo;
    $mansion_id = $vars["id"];
    $mansion = $pdo->query("SELECT * FROM mansions WHERE id = $mansion_id")->fetch();
    $mansion["birthday"] = new Carbon($mansion["birthday"]);

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