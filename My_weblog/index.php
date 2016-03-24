<?php
session_start();
include_once('Routeur/routeur.class.php');
$_GET['url'] = $_SERVER['PATH_INFO'];
$router = new Router($_GET['url']);

$router->get('/accueil', function(){ include_once('control/control_accueil.php'); }); 
$router->get('/inscription', function(){ include_once('control/control_inscription.php'); });
$router->get('/connexion', function() { include_once('control/control_connexion.php'); });
$router->get('/article', function() { include_once('control/control_tags.php'); });
$router->get('/admin', function() { include_once('control/control_panel.php'); });
$router->post('/inscription_verif', function() { include_once('control/control_inscription_verif.php'); });
$router->post('/connexion', function() { include_once('control/control_connexion.php'); });
$router->post('/article', function() { include_once('control/control_billet.php'); });
$router->post('/deco', function() { include_once('control/control_deco.php'); });
$router->post('/modif', function() { include_once('control/control_panel.php'); });
$router->post('/accueil', function(){ include_once('control/control_accueil.php'); }); 
$router->post('/article_modif', function() { include_once('control/control_tags.php'); });
$router->run(); 
?>