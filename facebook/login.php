<?php
 
/* Iniciando la sesión*/
session_start();
 
/* Cambiar según la ubicación de tu directorio*/
require_once __DIR__ . '/facebook/src/Facebook/autoload.php';
 
$fb = new Facebook\Facebook([
  'app_id' => '875726722799085',
  'app_secret' => 'be388a587a6b4d2d0378af99a11c9d86',
  'default_graph_version' => 'v2.4',
]); 
  
$helper = $fb->getRedirectLoginHelper();
  
$permissions = ['email']; // Permisos opcionales
$loginUrl = $helper->getLoginUrl('https://www.ivea.com.sv/facebook/fb-callback.php', $permissions);
  
/* Link a la página de login*/
echo '<a href="' . htmlspecialchars($loginUrl) . '">Login con Facebook!</a>';
 
?>


