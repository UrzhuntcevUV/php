<?php
/**
 * Напишите программу, выполняющую основные арифметические операции. С этой
 * целью отобразите форму с текстовым полем для ввода двух операндов и список,
 * размечаемых дескриптором < select >, для выбора операции сложения, вычитания,
 * умножения или деления. Организуйте проверку достоверности вводимых данных,
 * чтобы они были числовыми и пригодными для выполнения выбранной арифметической
 * операции. Функция обработки вводимых данных должна отображать операнды,
 * операцию и результат ее выполнения. Так, если введены операнды 4 и 2 и
 * выбрана операция умножения, то функция обработки вводимых данных должна
 * отобразить следующее: 4 * 2 = 8
 */

function process_form()
{
    $errors = 0;
    $val1 = $_POST['val1'];
    $val2 = $_POST['val2'];
    $operation = $_POST['operation'];

    if (!is_numeric($val1)) {
        echo '<span class="error">Первый операнд не является числом</span><br>';
        $errors++;
    }
    if (!is_numeric($val2)) {
        echo '<span class="error">Второй операнд не является числом</span><br>';
        $errors++;
    } elseif ($operation === '/' && $val2 == 0) {
        echo '<span class="error">Делитель не может быть 0</span><br>';
        $errors++;
    }

    if ($errors) {
        return;
    }

    $result = null;
    switch($operation) {
        case '+':
            $result = $val1 + $val2;
            break;
        case '-':
            $result = $val1 - $val2;
            break;
        case '*':
            $result = $val1 * $val2;
            break;
        case '/':
            $result = $val1 / $val2;
            break;
        default:
            echo 'Некорректный оператор';
    }

    echo "$val1 $operation $val2 = $result";
}
?>
<style>.error {color: red;}</style>
<form method="POST">
    <input type="text" name="val1">
    <select name="operation">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="text" name="val2">

    <button>Посчитать</button>
</form>

<?php
if (!empty($_POST)) {
    process_form();
}
?>