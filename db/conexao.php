<?php
$servidor="localhost";
$usuario="root";
$senha="";
$banco="primeiro_banco";

$pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);


function clearWave($var){
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
}



?>