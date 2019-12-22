<?php
/**
 * Напишите программу, в которой все блюда, находящиеся в таблице dishes,
 * перечисляются отсортированными по цене.
 */

define('MYSQL_USER', 'dbuser');
define('MYSQL_PASSWORD', 'dbpassword');
define('MYSQL_DATABASE', 'dbname');

$dbh = new PDO(
    'mysql:host=127.0.0.1;dbname='.MYSQL_DATABASE,
    MYSQL_USER,
    MYSQL_PASSWORD
);

$data = $dbh->query('SELECT * FROM dishes ORDER BY price');
?>
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
