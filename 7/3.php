<?php
/**
 * Напишите программу, отображающую форму со списком наименований блюд,
 * размечаемым дескриптором < select >. Составьте такой список из наименований
 * блюд, извлеченных из базы данных. После передачи формы на обработку программа
 * должна вывести из таблицы всю информацию о выбранном блюде, в том числе
 * идентификатор, наименование, цену и наличие специй в данном блюде.
 */

define('MYSQL_USER', 'dbuser');
define('MYSQL_PASSWORD', 'dbpassword');
define('MYSQL_DATABASE', 'dbname');

$dbh = new PDO(
    'mysql:host=127.0.0.1;dbname='.MYSQL_DATABASE,
    MYSQL_USER,
    MYSQL_PASSWORD
);

$minPrice = '';
if (!empty($_POST)) {
    if (isset($_POST['dishId'])) {
        $dishIdList = implode(',', $_POST['dishId']);

        $sql = "SELECT * FROM dishes WHERE dish_id IN ($dishIdList) ORDER BY dish_name";
        $data = $dbh->query($sql);
    }
}

$sql = "SELECT dish_id, dish_name FROM dishes ORDER BY dish_name";
$dishList = $dbh->query($sql);
?>

<form method="POST">
    <div>Выберите блюдо</div>
    <div>
        <select name="dishId[ ]" multiple>
            <?foreach($dishList as $row):?>
                <option value="<?=$row['dish_id']?>"><?=$row['dish_name']?></option>
            <?endforeach?>
        </select>
    </div>

    <div>
        <button>Показать</button>
    </div>
</form>

<?if (!empty($data)):?>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>Идентификатор</th>
            <th>Наименование</th>
            <th>Цена</th>
            <th>Наличие специй</th>
        </tr>

        <?foreach($data as $row):?>
            <tr>
                <td><?=$row['dish_id']?></td>
                <td><?=$row['dish_name']?></td>
                <td><?=$row['price']?></td>
                <td><?=$row['is_spicy'] ? 'да' : 'нет'?></td>
            </tr>
        <?endforeach?>
    </table>
<?endif?>
