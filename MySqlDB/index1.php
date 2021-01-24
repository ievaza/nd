<?php
///qyerinsim lenteles, kurios tarppusavy yra suristos, bazej dar to nepadarem

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

//SKAITYMAS INNER JOIN

// $sql = "SELECT 
// customers.id as customer_id,
// customers.name as customer_name,
// surname,
// products.id as product_id,
// `type`,
// products.name as vaggie
// FROM customers
// INNER JOIN products
// ON customers.id = products.customer_id;";

//LEFT JOIN 
// $sql = "SELECT 
// customers.id as customer_id,
// customers.name as customer_name,
// surname,
// products.id as product_id,
// `type`,
// products.name as vaggie
// FROM customers
// LEFT JOIN products
// ON customers.id = products.customer_id
// WHERE customers.name ='Jonas'
// ORDER BY customers.name;";


//RIGHT JOIN
// $sql = "SELECT 
// customers.id as customer_id,
// customers.name as customer_name,
// surname,
// products.id as product_id,
// `type`,
// products.name as vaggie
// FROM customers
// RIGHT JOIN products
// ON customers.id = products.customer_id;"



//rusiavimas pagal kaina, DESC->atvirksciai
 
// $stmt = $pdo->query($sql);//perduodu string per query metoda. <-- steitmentas

// $masyvas = [];
// while($row = $stmt->fetch()){ //fetch is steitmento paiima viena eilute. fetchina iki tol kol yra eiluciu

// $masyvas[] = $row;
// }



//SKAITYMAS

$sql = "SELECT *
FROM authors
LEFT JOIN connection
ON authors.id = connection.author_id
RIGHT JOIN books
ON books.id = connection.book_id;";
//rusiavimas pagal kaina, DESC->atvirksciai
 
$stmt = $pdo->query($sql);//perduodu string per query metoda. <-- steitmentas

$masyvas = [];
while($row = $stmt->fetch()){ //fetch is steitmento paiima viena eilute. fetchina iki tol kol yra eiluciu

$masyvas[] = $row;
}

_d($masyvas);
_d($masyvas);