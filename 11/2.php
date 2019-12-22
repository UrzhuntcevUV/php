<?php
/**
 * Видоизмените ответ на задание написать функцию validate_form() в упражнении
 * 3 из главы 7 таким образом, чтобы она выводила имена и значения всех
 * параметров из переданной на обработку формы в журнал регистрации ошибок на
 * веб-сервере.
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

function validate_form()
{
    $errors = 0;
    $val1 = $_POST['val1'];
    $val2 = $_POST['val2'];
    $operation = $_POST['operation'];

    error_log(json_encode($_POST));

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
    validate_form();
}
?>