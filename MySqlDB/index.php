<?php

$host = '127.0.0.1';
$db   = 'darzoviu_baze';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];


$pdo = new PDO( $dsn, $user, $pass, $options);

//RASYMAS

// $sql = "INSERT INTO `products` ( `type`, `name`, `price`)
// VALUES (1, 'Agurkas' , 0.78);";

// $pdo->query($sql);
//kiekvienu refreshu prides agurka

//REDAGAVIMAS

$sql = "UPDATE products
SET price = 2.99
WHERE `name`= 'Agurkas';";

$pdo->query($sql); //issiunciam i duomenu baze

//TRINA 

$sql = "DELETE FROM products
WHERE `name`='Agurkas';";
$pdo->query($sql);

//SKAITYMAS

$sql = "SELECT `id`, `type`, `name`, `price` FROM `products`
WHERE `type` = 2 OR `type` = 3
ORDER BY price DESC;";

//rusiavimas pagal kaina, DESC->atvirksciai
 
$stmt = $pdo->query($sql);//perduodu string per query metoda. <-- steitmentas

$masyvas = [];
while($row = $stmt->fetch()){ //fetch is steitmento paiima viena eilute. fetchina iki tol kol yra eiluciu

$masyvas[] = $row;
}

_d($masyvas);


