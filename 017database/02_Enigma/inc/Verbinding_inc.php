<?php
//Verbinding met de MySQL database
$host = 'mysql043.webhosting.be';
$user = 'ID131354_ydc1';
$password = '369kCK8B';
$database = 'ID131354_ydc1';
$link = mysqli_connect($host, $user, $password, $database);
if(!$link) {
    trigger_error('Fout bij verbinden met database: ' . mysqli_connect_error());
}

$link->set_charset('utf8');

?>

