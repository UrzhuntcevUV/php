<?php
session_start();

if (!empty($_POST)) {
    unset($_SESSION['order']);
}

$order = !empty($_SESSION['order']) ? $_SESSION['order'] : null;

$link = str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__ . '/4.php');
?>
<?if (!$order):?>
Заказ не создан
<?else:?>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>Товар</th>
            <th>Кол-во</th>
        </tr>

        <?foreach ($order as $product => $quantity):?>
            <tr>
                <td><?=$product?></td>
                <td><?=$quantity?></td>
            </tr>
        <?endforeach?>
    </table>

    <form method="POST">
        <input type="hidden" name="createOrder">
        <button>Оформить заказ</button>
    </form>
<?endif;?>

<p>
    <a href="<?=$link?>">Перейти на страницу создания заказа</a>
</p>
