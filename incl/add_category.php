<?php
if ($_SESSION['USER']) {
    if ($USER['role_id'] == 2) {
?>


        <?php

        if (isset($_POST['addcate'])) {
            $name = $_POST['name'];

            $flag = true;

            $errors = [
                '<p class="error">Заполните все поля</p>',

            ];
        }
        ?>


        <main>
            <div class="out_wrapper">
                <form action="" method="post">
                    <h1>Добавить категорию</h1>
                    <input type="text" name="name" placeholder="Название">
                        <?php

                    if (isset($_POST['addcate'])) {
                        if (empty($name)) {
                            $flag = false;
                            echo $errors[0];
                        }
                    }
                    ?>
                    <input class="form_btn" type="submit" name="addcate" value="Добавить">
                </form>
            </div>
        </main>



        <?php
        if (isset($_POST['addcate'])) {
            if ($flag == true) {


                $sql = "INSERT INTO `category`(`id`, `name`) VALUES (NULL,'$name')";
                $query = $conn->query($sql);


                echo '<script> document.location.href="?page=admin" </script>';
            }
        }

        ?>



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