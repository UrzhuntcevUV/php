<?php
/**
 * Отобразите файл формата CSV в виде НТМL-таблицы. Если у вас нет под рукой
 * такого файла (или программы электронных таблиц), воспользуйтесь данными из
 * примера 29.
 */

$csvfile = __DIR__ . '/cities.csv';

$handle = fopen($csvfile, 'r');
?>
<table border="1" cellspacing="0" cellpadding="5">
    <?while ($row = fgetcsv($handle)):?>
        <tr>
            <?foreach ($row as $col):?>
                <td><?=$col?></td>
            <?endforeach;?>
        </tr>
    <?endwhile;?>
</table>
<?fclose($handle);?>
