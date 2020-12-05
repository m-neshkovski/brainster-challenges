<?php 

$db_name='challenge14'; // ime na baza
$servername='localhost'; // adresa na server
$username='root'; // user na baza
$password=''; // pass na baza
$db_type = 'mysql'; // moze oracle, posgres i drugi

$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // po default e PDO::FETCH_BOTH
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

try { // dsn Data Source name
    $conn = new PDO("$db_type:host=$servername;dbname=$db_name", $username, $password, $options); // proba dali bazata e konektirana
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}




?>