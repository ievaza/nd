<?php
define('DOOR_BELL','ring');
define('INSTAL_FOLDER', '/PHP/nd/Agurkai-suJS/'); //konstanta , instalecinis folderis ir ji ismetu:
define('URL','http://localhost/PHP/nd/Agurkai-suJS/');
define('DIR', __DIR__);


include __DIR__.'/bootstrap.php'; // kur kabykla rubam kabinti 


//Router
Main\App::route();



