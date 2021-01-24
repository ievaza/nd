<?php
define('INSTAL_FOLDER', '/PHP/nd/Agurkai-MVC/'); //konstanta , instalecinis folderis ir ji ismetu:
define('URL','http://localhost/PHP/nd/Agurkai-MVC/');
define('DIR', __DIR__);


include __DIR__.'/bootstrap.php'; // kur kabykla rubam kabinti 


//Router
Main\App::route();



