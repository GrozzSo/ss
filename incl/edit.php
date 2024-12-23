<?php
if ($_SESSION['USER']) {
    if ($USER['role_id'] == 2) {
?>

        <?php
        $sql = "SELECT * FROM `category`";
        $catergorys = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);


        $product_id = $_GET['id'];
        $sql = "SELECT * FROM `catalog` WHERE `id` = '$product_id' ";
        $catalog = $conn->query($sql)->fetch();

        if (isset($_POST['editcat'])) {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            if ($_FILES['img']['size'] > 0) {
                $img = 'images/' . time() . $_FILES['img']['name'];
            }

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
                    <h1>Редактировать товар</h1>
                    <input type="text" name="name" placeholder="Название" value="<?= $catalog['name'] ?>">
                    <?php

                    if (isset($_POST['editcat'])) {
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
                                <option
                                    <?
                                    if ($categor['id'] == $catalog['category_id']) { ?>
                                    selected
                                    <?
                                    }
                                    ?>
                                    value="<?= $categor['id'] ?>"><?= $categor['name'] ?></option>
                        <?
                            }
                        } else {
                            echo '<p class="error">Спико категорий пуст</p>';
                        }
                        ?>
                    </select>
                    <input type="text" name="price" placeholder="Цена" value="<?= $catalog['price'] ?>">
                    <?php

                    if (isset($_POST['editcat'])) {
                        if (empty($price)) {
                            $flag = false;
                            echo $errors[0];
                        }
                    }
                    ?>
                    <textarea name="description" placeholder="Описание"><?= $catalog['description'] ?></textarea>
                    <?php

                    if (isset($_POST['editcat'])) {
                        if (empty($description)) {
                            $flag = false;
                            echo $errors[0];
                        }
                    }
                    ?>
                    <input type="file" name="img">


                    <input class="form_btn" type="submit" name="editcat" value="Редактировать">
                </form>
            </div>
        </main>


        <?php
        if (isset($_POST['editcat'])) {
            if ($flag == true) {
                if ($_FILES['img']['size'] > 0) {
                    move_uploaded_file($_FILES['img']['tmp_name'], $img);
                    $sql = "UPDATE `catalog` SET `name`='$name',`price`='$price',`description`='$description',`img`='$img',`category_id`='$category' WHERE `id`= '$product_id'";
                    $query = $conn->query($sql);
                } else {
                    $sql = "UPDATE `catalog` SET `name`='$name',`price`='$price',`description`='$description',`category_id`='$category' WHERE `id`= '$product_id'";
                    $query = $conn->query($sql);
                }



                echo '<script> document.location.href="index.php" </script>';
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
?>s