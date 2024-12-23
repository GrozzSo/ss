<?
session_start();
include 'database.php';

if(isset($_SESSION['USER'])){
    $usid = $_SESSION['USER'];
    $sql = "SELECT * FROM `user` WHERE id = '$usid'";
    $USER= $conn->query($sql)->fetch();
    
 }

 if(isset($_GET['exit'])){
    session_destroy();

    echo '<script> document.location.href="index.php" </script>';
 }