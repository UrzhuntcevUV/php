<?php
/**
 * Напишите программу, отображающую, проверяющую достоверность и обрабатывающую
 * форму для ввода сведений о доставленной посылке. Эта форма должна содержать
 * поля ввода адресов отправителя и получателя, а также размеров и веса посылки.
 * При проверке достоверности данных из переданной на обработку формы должно
 * быть установлено, что вес посылки не превышает 150 фунтов (около 68 кг), а
 * любой из ее размеров — 36 дюймов (порядка 91 см). Можете также допустить, что
 * в форме введены адреса США, но в таком случае проверьте правильность ввода
 * обозначения штата и почтового индекса. Функция обработки формы в вашей
 * программе должна выводить на экран сведения о посылке в виде организованного,
 * отформатированного отчета.
 */

$errors = [];

$sender = '';
$senderIndex = '';
$recipient = '';
$recipientIndex = '';
$width = '';
$length = '';
$height = '';
$weight = '';

$successful = false;

define('MAX_SIZE', 91);
define('MAX_WEIGHT', 68);

if (!empty($_POST)) {
    if (empty($_POST['sender'])) {
        $errors[] = 'Не заполнено поле отправитель';
    } else {
        $sender = $_POST['sender'];
    }

    if (empty($_POST['senderIndex'])) {
        $errors[] = 'Не заполнено поле индекс отправителя';
    } else {
        $senderIndex = $_POST['senderIndex'];
        if (!preg_match("/^\d+$/", $senderIndex) || strlen($senderIndex) < 6) {
            $errors[] = 'Индекс отправителя имеет неверный формат';
        }
    }

    if (empty($_POST['recipient'])) {
        $errors[] = 'Не заполнено поле получатель';
    } else {
        $recipient = $_POST['recipient'];
    }

    if (empty($_POST['recipientIndex'])) {
        $errors[] = 'Не заполнено поле индекс получателя';
    } else {
        $recipientIndex = $_POST['recipientIndex'];
        if (!preg_match("/^\d+$/", $recipientIndex) || strlen($recipientIndex) < 6) {
            $errors[] = 'Индекс получателя имеет неверный формат';
        }
    }

    if (empty($_POST['width'])) {
        $errors[] = 'Не указана ширина';
    } else {
        $width = $_POST['width'];
        if ($width > MAX_SIZE) {
            $errors[] = 'Ширина больше допустимой';
        }
    }

    if (empty($_POST['height'])) {
        $errors[] = 'Не указана высота';
    } else {
        $height = $_POST['height'];
        if ($height > MAX_SIZE) {
            $errors[] = 'Высота больше допустимой';
        }
    }

    if (empty($_POST['length'])) {
        $errors[] = 'Не указана длина';
    } else {
        $length = $_POST['length'];
        if ($length > MAX_SIZE) {
            $errors[] = 'Длина больше допустимой';
        }
    }

    if (empty($_POST['weight'])) {
        $errors[] = 'Не указан вес';
    } else {
        $weight = $_POST['weight'];
        if ($weight > MAX_WEIGHT) {
            $errors[] = 'Вес больше допустимого';
        }
    }

    $successful = empty($errors);
}
?>
<style>
    .error {
        color: red;
    }
</style>
<form method="POST">
    <div class="field">
        Адрес отправителя:<br>
        <input type="text" name="sender" value="<?=$sender?>">
    </div>

    <div class="field">
        Индекс отправителя:<br>
        <input type="text" name="senderIndex" value="<?=$senderIndex?>">
    </div>

    <div class="field">
        Адрес получателя:<br>
        <input type="text" name="recipient" value="<?=$recipient?>">
    </div>

    <div class="field">
        Индекс получателя:<br>
        <input type="text" name="recipientIndex" value="<?=$recipientIndex?>">
    </div>

    <div class="field">
        Ширина посылки:<br>
        <input type="text" name="width" value="<?=$width?>">
    </div>

    <div class="field">
        Высота посылки:<br>
        <input type="text" name="height" value="<?=$height?>">
    </div>

    <div class="field">
        Длина посылки:<br>
        <input type="text" name="length" value="<?=$length?>">
    </div>

    <div class="field">
        Высота посылки:<br>
        <input type="text" name="weight" value="<?=$weight?>">
    </div>

    <button>Отправить</button>
</form>

<?if (!empty($errors)):?>
    <?foreach ($errors as $error):?>
        <div class="error"><?=$error?></div>
    <?endforeach?>
<?endif?>

<?if ($successful):?>
<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <td>
            <table>
                <tr><td>От кого: <?=$sender?></td></tr>
                <tr><td>Индекс отправителя: <?=$senderIndex?></td></tr>
                <tr><td>Вес посылки: <?=$weight?></td></tr>
                <tr><td>Размеры: <?=$width . 'x' . $length .'x'.$height ?></td></tr>
            </table>
        </td>

        <td>
            <table>
                <tr><td>Кому: <?=$recipient?></td></tr>
                <tr><td>Индекс получателя: <?=$recipientIndex?></td></tr>
            </table>
        </td>
    </tr>
</table>
<?endif?>

