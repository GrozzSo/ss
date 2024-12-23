<?
try{
$dbname="exam";
$user="root";
$password = "";
$host ="localhost";
$conn = new PDO("mysql:host=$host;charset=utf8;dbname=$dbname", $user, $password);
}catch(PDOException $e){
    echo 'Ошибка подклювения бд' . $e;
}