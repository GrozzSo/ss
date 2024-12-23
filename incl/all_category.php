<?php
if ($_SESSION['USER']) {
    if ($USER['role_id'] == 2) {
?>

        <?
        $sql = "SELECT * FROM `category`";
        $catergorys = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        ?>



        <main>
            <div class="out_wrapper">
                <h1>Все категории</h1>
                <div class="categories_block">
                    <?
                    if (count($catergorys) > 0) {
                        foreach ($catergorys as $categor) {
                            $catid = $categor['id']
                    ?>
                            <div class="product product_basket">
                                <p><?=$categor['name']?> </p>
                                <a href="?page=deletecate&id=<?=$catid?>" class="minus btn_auth">Удалить</a>
                            </div>
                    <?
                        }
                    } else {
                        echo '<p class="error">Спико категорий пуст</p>';
                    }
                    ?>

                </div>
            </div>
            </div>
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