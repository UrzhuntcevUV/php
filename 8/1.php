<?php
/**
 * Создайте вне интерпретатора РНР новый НТМL-файл шаблона по образцу,
 * приведенному в примере 9.1. Напишите программу, в которой функции
 * file_get_contents() и file_put_contents() применяются для чтения НТМL-файла
 * шаблона, вместо переменных в шаблон подставляются соответствующие значения,
 * а новая страница сохраняется в отдельном файле.
 */

$templatePath = __DIR__ . '/template.html';

if (!empty($_POST)) {
    $page_title = $_POST['page_title'];
    $color = $_POST['color'];
    $page_name = $_POST['page_name'];

    $page = file_get_contents($templatePath);
    $page = str_replace('{page_title}', $page_title, $page);
    $page = str_replace('{color}', $color, $page);

    $saveFileName = $page_name . '.html';
    $saveFilePath = __DIR__ . '/' . $saveFileName;
    file_put_contents($saveFilePath, $page);

    $redirectUrl = str_replace($_SERVER['DOCUMENT_ROOT'], '', $saveFilePath);
    header("Location:".$redirectUrl);
}

?>

<form method="POST">
    <div class="field">
        Название страницы:<br>
        <input type="text" name="page_title">
    </div>

    <div class="field">
        Цвет:<br>
        <input type="text" name="color">
    </div>

    <div class="field">
        Название страницы:<br>
        <input type="text" name="page_name">
    </div>

    <button>Создать страницу</button>
</form>
