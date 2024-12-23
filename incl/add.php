<?php
if ($_SESSION['USER']) {
    if ($USER['role_id'] == 2) {
?>

        <?php


        $sql = "SELECT * FROM `category`";
        $catergorys = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        if (isset($_POST['addcat'])) {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $img = 'images/' . time() . $_FILES['img']['name'];


            $flag = true;

            $errors = [
                '<p class="error">Заполните все поля</p>',
                '<p class="error">Загрузите фотографию</p>'
            ];
        }
        ?>

        <main>
            <div class="out_wrapper">
                <form action="" method="post" enctype="multipart/form-data">
                    <h1>Добавить дом</h1>
                    <input type="text" name="name" placeholder="Название">
                    <?php

                    if (isset($_POST['addcat'])) {
                        if (empty($name)) {
                            $flag = false;
                            echo $errors[0];
                        }
                    }
                    ?>
                    <select name="category">
                        <?
                        if (count($catergorys) > 0) {
                            foreach ($catergorys as $categor) {
                        ?>
                                <option value="<?= $categor['id'] ?>"><?= $categor['name'] ?></option>
                        <?
                            }
                        } else {
                            echo '<p class="error">Спико категорий пуст</p>';
                        }
                        ?>
                    </select>
                    <?php

                    if (isset($_POST['addcat'])) {
                        if (empty($category)) {
                            $flag = false;
                            echo $errors[0];
                        }
                    }
                    ?>
                    <input type="text" name="price" placeholder="Цена">
                    <?php

                    if (isset($_POST['addcat'])) {
                        if (empty($price)) {
                            $flag = false;
                            echo $errors[0];
                        }
                    }
                    ?>
                    <textarea name="description" placeholder="Описание"></textarea>
                    <?php

                    if (isset($_POST['addcat'])) {
                        if (empty($description)) {
                            $flag = false;
                            echo $errors[0];
                        }
                    }
                    ?>
                    <input type="file" name="img">
                    <?php

                    if (isset($_POST['addcat'])) {
                        if (empty($img)) {
                            $flag = false;
                            echo $errors[1];
                        }
                    }
                    ?>

                    <input class="form_btn" type="submit" name="addcat" value="Добавить">
                </form>
            </div>
        </main>

        <?php
        if (isset($_POST['addcat'])) {
            if ($flag == true) {
                move_uploaded_file($_FILES['img']['tmp_name'], $img);


                $sql = "INSERT INTO `catalog`(`id`, `name`, `price`, `description`, `img`, `category_id`) VALUES (NULL, '$name','$price','$description','$img','$category')";
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