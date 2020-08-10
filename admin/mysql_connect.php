<?php
$host="localhost";
$dbname="testdb";
$user="root";
$pass="";

try {
    
    $db= new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    

} catch (PDOException $e) {
    echo "Veritabanı bağlantısı hatalı! " . $e->getMessage() . "<br/>";
   
}
?>