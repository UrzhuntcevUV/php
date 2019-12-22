<?php
/**
 * Напишите на РНР программу, отображающую форму, в которой пользователю
 * предлагается указать имя файла в корневом каталоге документов на веб-сервере.
 * Если такой файл существует на веб-сервере, доступен для чтения и находится в
 * корневом каталоге документов, то программа должна отобразить его содержимое.
 * Так, если пользователь введет имя файла article.html, программа должна
 * отобразить содержимое файла article.html, находящегося в корневом каталоге
 * документа. А если пользователь введет путь к файлу саtalog/show.php,
 * программа должна отобразить содержимое файла show.php из каталога catalog,
 * входящего в корневой каталог документа.
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
        }

        if (!is_readable($path)) {
            $errors[] = 'Файл не доступен для чтения';
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
    Путь к файлу:<br>
    <input type="text" name="path"><br>
    <button>Показать</button>
</form>

<?if (!empty($errors)):?>
    <?foreach ($errors as $error):?>
        <div class="error"><?=$error?></div>
    <?endforeach;?>
<?else:?>
    <h1>Содержимое файла</h1>
    <code class="content">
        <?$handle = fopen($path, 'r');?>
        <?while($buffer = fgets($handle)):?>
            <?=htmlspecialchars($buffer)?><br>
        <?endwhile?>
        <?fclose($handle);?>
    </code>
<?endif?>
