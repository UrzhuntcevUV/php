<?php
/**
 * Напишите на РНР программу, отображающую форму, где пользователь может выбрать
 * излюбленный цвет из списка. Создайте еще одну страницу с цветом фона,
 * выбранным пользователем в данной форме. Сохраните значение этого цвета в
 * массиве $_SESSION, чтобы сделать его доступным на обеих страницах.
 */

session_start();

$file = __DIR__ . '/html-colors.json';
$data = file_get_contents($file);
$colors = json_decode($data, true);

if (!empty($_POST)) {
    $_SESSION['color'] = $_POST['color'];
}

$color = !empty($_SESSION['color']) ? $_SESSION['color'] : 'white';
?>
<!doctype html>
<html>
<body style="background: <?=$color?>;">
<form method="POST">
    Выберите цвет:
    <select name="color">
        <?foreach($colors as $colorName => $hex):?>
            <option value="<?=$hex?>"><?=$colorName?></option>
        <?endforeach?>
    </select>
    <button>Сохранить</button>
</form>
</body>
</html>

