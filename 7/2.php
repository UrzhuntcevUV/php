<?php
/**
 * Напишите программу, отображающую форму с запросом блюд по их цене.
 * После передачи формы на обработку программа должна вывести наименования и
 * цены тех блюд, которые стоят не меньше, чем указано в форме. Не извлекайте из
 * таблицы базы данных строки или столбцы, которые не подлежат выводу на экран.
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
    if (isset($_POST['minPrice'])) {
        $minPrice = $_POST['minPrice'];
    }

    $sql = "SELECT * FROM dishes WHERE price >= $minPrice ORDER BY price";
    $data = $dbh->query($sql);
}

?>

<form method="POST">
    <div>Введите минимальную цену</div>
    <div>
        <input type="text" name="minPrice" value="<?=$minPrice?>">
    </div>

    <div>
        <button>Показать</button>
    </div>
</form>

<?if (!empty($data)):?>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>Наименование</th>
            <th>Цена</th>
        </tr>

        <?foreach($data as $row):?>
            <tr>
                <td><?=$row['dish_name']?></td>
                <td><?=$row['price']?></td>
            </tr>
        <?endforeach?>
    </table>
<?endif?>
