<?php
if (isset($_POST['regist'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_r = $_POST['password-r'];

    $flag = true;

    $errors = [
        '<p class="error">Заполните все поля</p>',
        '<p class="error">Не верный email</p>',
        '<p class="error">Повтарите пароль</p>',
        '<p class="error">Пароли не совпадают</p>',
        '<p class="error">Вы уже зарегестированы</p>',
        '<p class="error">Пароль должен включать не менее 6 символов</p>'

    ];
}
?>
<main>
    <div class="out_wrapper">
        <form action="" method="post">
            <h1>Регистрация</h1>

            <input type="text" name="name" placeholder="Имя*">
            <?php
            if (isset($_POST['regist'])) {
                if (empty($name)) {
                    $flag = false;
                    echo $errors[0];
                }
            }
            ?>
            <input type="text" name="surname" placeholder="Фамилия*">
            <?php
            if (isset($_POST['regist'])) {
                if (empty($surname)) {
                    $flag = false;
                    echo $errors[0];
                }
            }
            ?>
            <input type="text" name="email" placeholder="Почта*">
            <?php
            if (isset($_POST['regist'])) {
                if (empty($name)) {
                    $flag = false;
                    echo $errors[0];
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $flag = false;
                    echo $errors[1];
                } else {
                    $sql = "SELECT * FROM `user` WHERE `email`= '$email'";
                    $res = $conn->query($sql)->fetchColumn();
                    if ($res != 0) {
                        $flag = false;
                        echo $errors[4];
                    }
                }
            }
            ?>
            <input type="password" name="password" placeholder="Пароль*">
            <?php
            if (isset($_POST['regist'])) {
                if (empty($password)) {
                    $flag = false;
                    echo $errors[0];
                }elseif(strlen($password) < 6 ){
                    $flag = false;
                    echo $errors[5];
                }
            }
            ?>
            <input type="password" name="password-r" placeholder="Повторите пароль*">
            <?php
            if (isset($_POST['regist'])) {
                if (empty($password_r)) {
                    $flag = false;
                    echo $errors[0];
                } elseif ($password != $password_r) {
                    $flag = false;
                    echo $errors[3];
                }
            }
            ?>
            <input class="form_btn" type="submit" name="regist" value="Зарегистрироваться">
        </form>
    </div>
</main>

<?php
if (isset($_POST['regist'])) {
    if ($flag == true) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `user`(`id`, `name`, `surname`, `email`, `password`) VALUES (NULL, '$name', '$surname', '$email', '$password')";
        $query = $conn->query($sql);

        echo '<script> document.location.href="?page=login" </script>';
    }
}

?>