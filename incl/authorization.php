<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $flag = true;

    $errors = [
        '<p class="error">Заполните все поля</p>',
        '<p class="error">Не верный email</p>',
        '<p class="error">Пароль не верный</p>',
        '<p class="error">Ваш аккаунт заблокирован</p>',
        '<p class="error">Вы не зарегестрированы</p>'

    ];
}
?>
<main>
    <div class="out_wrapper">
        <form action="" method="post">
            <h1>Авторизация</h1>
            <input type="text" name="email" placeholder="Почта">
            <?php
            $sql = "SELECT * FROM `user` WHERE `email`= '$email'";
            $res = $conn->query($sql)->fetch();
            if (isset($_POST['login'])) {
                if (empty($email)) {
                    $flag = false;
                    echo $errors[0];
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $flag = false;
                    echo $errors[1];
                } elseif (!$res) {
                    $flag = false;
                    echo $errors[4];
                } else   if ($res['role_id'] == 3) {
                    $flag = false;
                    echo $errors[3];
                }
            }
            ?>
            <input type="password" name="password" placeholder="Пароль">
            <?php

            if (isset($_POST['login'])) {
                if (empty($password)) {
                    $flag = false;
                    echo $errors[0];
                } elseif (!password_verify($password, $res['password'])) {
                    $flag = false;
                    echo $errors[2];
                }
            }
            ?>
            <input class="form_btn" type="submit" name="login" value="Авторизоваться">
        </form>
    </div>
</main>

<?php
if (isset($_POST['login'])) {
    if ($flag == true) {

        $_SESSION["USER"] = $res['id'];

        echo '<script> document.location.href="?page=profile" </script>';
    }
}

?>