<?php
/**
 * Видоизмените ответ на задание в упражнении 4 из главы 8 таким образом, чтобы
 * воспользоваться специальной функцией обработки ошибок обращения к базе
 * данных, выводящей разные сообщения в окно веб-браузера и журнал регистрации
 * ошибок на веб-сервере. Эта функция обработки ошибок должна совершать выход из
 * программы после вывода сообщений об ошибках.
 */

function exceptionHandler($ex) {
    $error = "{$ex->getMessage()} in {$ex->getFile()} {$ex->getLine()}";
    error_log($error);
    echo "<pre>";
    print_r($error);
    echo "</pre>";
    die();
}
set_exception_handler('exceptionHandler');

define('MYSQL_USER', 'dbuser');
define('MYSQL_PASSWORD', 'dbpassword');
define('MYSQL_DATABASE', 'dbname');

$dbh = new PDO(
    'mysql:host=127.0.0.1;dbname='.MYSQL_DATABASE,
    MYSQL_USER,
    MYSQL_PASSWORD
);

$success = null;
$errors = [];
if (!empty($_POST)) {
    if (empty($_POST['name'])) {
        $errors[] = 'Не заполнено поле: имя';
    }

    if (empty($_POST['phone'])) {
        $errors[] = 'Не заполнено поле: телефон';
    }

    if (count($errors) === 0) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $dishId = $_POST['dishId'];

        $sql = "INSERT INTO users (name, phone, dish_id) VALUES('$name', '$phone', $dishId)";
        $success = $dbh->exec($sql);
    }
}

$sql = "SELECT dish_id, dish_name FROM dishes ORDER BY dish_name";
$dishes = $dbh->query($sql);

$sql = "
SELECT users.id, users.name, users.phone, dishes.dish_name as dish_name
FROM users
    LEFT JOIN dishes on users.dish_id = dishes.dish_id
ORDER BY users.id";
$users = $dbh->query($sql);
?>
<style>
    .table, .form {
        float: left;
        padding: 15px;
    }

    .field {
        margin-bottom: 10px;
    }

    .error {
        color: red;
    }

    .success {
        color: green;
    }
</style>

<div class="container">
    <div class="table">

        <table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th>Идентификатор</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Любимое блюдо</th>
            </tr>

            <?foreach($users as $user):?>
                <tr>
                    <td><?=$user['id']?></td>
                    <td><?=$user['name']?></td>
                    <td><?=$user['phone']?></td>
                    <td><?=$user['dish_name']?></td>
                </tr>
            <?endforeach?>
        </table>
    </div>

    <div class="form">

        <form method="POST">
            <div class="field">
                Имя:<br>
                <input type="text" name="name" value="">
            </div>

            <div class="field">
                Телефон:<br>
                <input type="text" name="phone" value="">
            </div>

            <div class="field">
                Любимое блюдо блюдо:<br>
                <select name="dishId">
                    <?foreach($dishes as $row):?>
                        <option value="<?=$row['dish_id']?>"><?=$row['dish_name']?></option>
                    <?endforeach?>
                </select>
            </div>

            <button>Добавить</button>

            <?if (!empty($errors)):?>
                <?foreach($errors as $error):?>
                    <div class="error"><?=$error?></div>
                <?endforeach;?>
            <?endif?>

            <?if ($success):?>
                <div class="success">Посетитель успешно добавлен</div>
            <?endif?>
        </form>
    </div>
</div>