<?php
if ($_SESSION['USER']) {
    if ($USER['role_id'] == 2) {
?>

        <?php
        $idproduct = $_GET['id'];
        if ($_GET['page'] == 'deletecat') {
            if (isset($_POST['yes'])) {
                $sql = "DELETE FROM `catalog` WHERE `id`='$idproduct'";
                $query = $conn->query($sql);
                echo '<script> document.location.href="index.php" </script>';
            } else if (isset($_POST['no'])) {
                echo '<script> document.location.href="index.php" </script>';
            }
        } else if ($_GET['page'] == 'deletecate') {
            if (isset($_POST['yes'])) {
                $sql = "DELETE FROM `category` WHERE `id`='$idproduct'";
                $query = $conn->query($sql);
                echo '<script> document.location.href="?page=all_category" </script>';
            } else if (isset($_POST['no'])) {
                echo '<script> document.location.href="?page=all_category" </script>';
            }
        }

        ?>
        <main>
            <div class="out_wrapper">
                <form action="" method="post">
                    <h1>Потверждение</h1>
                    <h2>
                        Вы уверены?
                    </h2>
                    <input class="form_btn" type="submit" name="yes" value="Потвердить">
                    <input class="form_btn" type="submit" name="no" value="нет">
                </form>
            </div>
        </main>



    <?php
    } else {
    ?>
        <h1>
            Ошибка 404
        </h1>
    <?
    }
} else {
    ?>
    <h1>
        Ошибка 404
    </h1>
<?
}
?>