<?php
/**
 * Приведенная ниже программа предназначена для вывода в алфавитном порядке
 * списка всех посетителей ресторана из таблицы по заданию в упражнении 4 из
 * главы 8. Выявите и устраните имеющиеся в ней ошибки.
 *
 * 1. } catch ($е) { -> } catch (Exception $е) {
 * 2. [$row['dish_id']]] -> [$row['dish_id']]
 * 3. SELECT ** -> SELECT *
 * 4. count($customers) = 0 -> count($customers) == 0
 * 5. %f -> %s
 *
 * Чтобы выводить не ИД блюда а название блюда можно заменить
 * $customer['dish_id'] -> $dish_names[$customer['dish_id']]
 */

define('MYSQL_USER', 'dbuser');
define('MYSQL_PASSWORD', 'dbpassword');
define('MYSQL_DATABASE', 'dbname');

// подключиться  к  базе  данных
try {
    $db = new PDO(
        'mysql:host=127.0.0.1;dbname='.MYSQL_DATABASE,
        MYSQL_USER,
        MYSQL_PASSWORD
    );
} catch (Exception $e) {
    die ("Can't connect:  " . $e->getMessage());
}

// организовать  обработку  исключений
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// установить  режим  извлечения  строк  из  таблицы  в  виде  массивов
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// получить  массив  наименований  блюд  из  базы  данных
$dish_names = array();
$res = $db->query('SELECT  dish_id,dish_name  FROM  dishes');
foreach ($res->fetchAll() as $row) {
    $dish_names[$row['dish_id']] =  $row['dish_name'];
}
$res = $db->query('SELECT * FROM users ORDER BY phone DESC');
$customers = $res->fetchAll();
if (count($customers) == 0) {
    print  "No  customers .";
} else {
    print  '<table>';
    print  '<tr><th>ID</th><th>Name</th><th>Phone</th> 
		<th>Favorite  Dish</th></tr>';
    foreach ($customers as $customer) {
        printf(
            "<tr><td>%d</td><td>%s</td> 
				<td>%s</td><td>%s</td> 
				</tr>\n",
            $customer['id'],
            htmlentities($customer['name']),
            $customer ['phone'],
            $dish_names[$customer['dish_id']]);
    }
}
print  '</table>';
