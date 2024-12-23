<?
include "connect/database.php";
include "connect/head.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Природный Оазис</title>
    <link rel="icon" type="image/svg" href="images/logo.svg">
</head>

<body>
    <?
    include "companents/header.php";
    ?>


    <?
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == "add_category") {
            include "incl/add_category.php";
        } else if ($page == "add") {
            include "incl/add.php";
        } else if ($page == "admin") {
            include "incl/admin.php";
        } else if ($page == "all_category") {
            include "incl/all_category.php";
        } else if ($page == "login") {
            include "incl/authorization.php";
        } else if ($page == "basket") {
            include "incl/basket.php";
        } else if ($page == "deletecat") {
            include "incl/delete.php";
        }else if ($page == "deletecate") {
            include "incl/delete.php";
        } else if ($page == "edit") {
            include "incl/edit.php";
        } else if ($page == "order") {
            include "incl/order.php";
        } else if ($page == "product") {
            include "incl/product.php";
        } else if ($page == "profile") {
            include "incl/profile.php";
        } else if ($page == "regist") {
            include "incl/registration.php";
        } else if ($page == "catalog") {
            include "incl/start.php";
        }
    } else {
        include "incl/start.php";
    }
    ?>



    <?
    include "companents/footer.php";
    ?>
</body>

</html>