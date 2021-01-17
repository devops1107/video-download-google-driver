<?php

define("HOME_DIR", __DIR__);
require_once __DIR__ . '/vendor/autoload.php';
use Pecee\SimpleRouter\SimpleRouter;
require_once 'routes.php';
require_once 'helpers.php';
session_start();
SimpleRouter::setDefaultNamespace('\Demo\Controllers');

// Start the routing
SimpleRouter::start();

//include_once 'Request.php';
//include_once 'Router.php';
//require "config.php";
//define('MAIN', __DIR__);
//$router = new Router(new Request);
//
//$router->get('/', function() {
//    require "views/home.php";
//});
//
////Login Area
//$router->get('/login', function() {
//    require "views/login.php";
//});
//$router->post('/login', function($request) {
//    $data = $request->getBody();
//    require 'includes/actions.php';
//    return  header('Location: ' . $request->httpReferer);
//});
//
////Register
//$router->get('/register', function() {
//    require "views/register.php";
//});
//$router->post('/register', function($request) {
//    // return json_encode($request);
//    $data = $request->getBody();
//    require 'includes/actions.php';
//    return header('Location: ' . $request->httpReferer);
//});
//
////logout
//$router->get('/logout', function() {
//    session_destroy();
//    header('Location: /');
//});
//
////dashboard
//$router->get('/dashboard', function() {
//    global $conn;
//    require "views/dashboard.php";
//});
//$router->get('/dashboard/add', function() {
//    echo $_SERVER['QUERY_STRING'];
//});
//
//
//$router->get('/profile', function($request) {
//    return <<<HTML
//  <h1>Profile</h1>
//HTML;
//});
//
//$router->post('/data', function($request) {
//
//    return json_encode($request->getBody());
//});
