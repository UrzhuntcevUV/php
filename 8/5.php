<?php
/**
 * Видоизмените программу из предыдущего упражнения, чтобы она отображала только
 * файлы с расширением .html. Ведь разрешать пользователям просматривать
 * исходный код РНР любой страницы веб-сайта опасно, если она содержит уязвимую
 * информацию (например, имена пользователей и их пароли).
 */

$errors = [];
$path = null;

if (!empty($_POST)) {
    if (empty($_POST['path'])) {
        $errors[] = 'Не заполнен путь';
    } else {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . $_POST['path'];

        if (!file_exists($path)) {
            $errors[] = 'Файл не существует';
        } else {
            if (!is_readable($path)) {
                $errors[] = 'Файл не доступен для чтения';
            }

            $pathinfo = pathinfo($path);
            if ($pathinfo['extension'] !== 'html') {
                $errors[] = 'Файл должен иметь расширение html';
            }
        }
    }
}
?>
<style>
    .error {
        color: red;
    }
</style>
<form method="POST">
    Путь к файлу(*.html):<br>
    <input type="text" name="path"><br>
    <button>Показать</button>
</form>

<?if (!empty($errors)):?>
    <?foreach ($errors as $error):?>
        <div class="error"><?=$error?></div>
    <?endforeach;?>
<?elseif (isset($path)):?>
    <h1>Содержимое файла</h1>
    <code class="content">
        <?$handle = fopen($path, 'r');?>
        <?while($buffer = fgets($handle)):?>
            <?=htmlspecialchars($buffer)?><br>
        <?endwhile?>
        <?fclose($handle);?>
    </code>
<?endif?>
