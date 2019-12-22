<?php
/**
 * Видоизмените программу из предыдущего упражнения, чтобы вывести счет в
 * отформатированном виде. В частности, выведите сначала цену и количество
 * каждого блюда вместе с общей стоимостью трапезы, а затем общую стоимость
 * еды и напитков как без учета, так и с учетом налога на добавленную стоимость
 * и чаевых. Непременно выровняйте цены в выводимом счете по вертикали.
 */

$order = [
    ['name' => 'Гамбургер', 'count' => 2, 'price' => 49.5],
    ['name' => 'Молочно-шоколадный коктейль', 'count' => 1, 'price' => 19.5],
    ['name' => 'Кока-Кола', 'count' => 1, 'price' => 8.5],
];

$tax = 7.5;
$tip = 16;

$total = 0;
?>
<table border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <td>Наименование</td>
            <td>Цена за единицу</td>
            <td>Количество</td>
            <td>Общая цена</td>
            <td>Общая цена c налогом <?=$tax?>%</td>
            <td>Общая цена c налогом <?=$tax?>% и чаевыми <?=$tip?>%</td>
        </tr>
    </thead>

    <tbody>
        <?foreach ($order as $item):?>
            <?
            $all = $item['price'] * $item['count'];
            $allWithTax = $all + ($all * 0.075);
            $allWithTip = $allWithTax + ($all * 0.16);
            $total += $all;
            ?>
            <tr>
                <td><?=$item['name']?></td>
                <td><?=$item['price']?> руб.</td>
                <td><?=$item['count']?> шт.</td>
                <td><?=$all?> руб.</td>
                <td><?=$allWithTax?> руб.</td>
                <td><?=$allWithTip?> руб.</td>
            </tr>
        <?endforeach?>
    </tbody>

    <?
    $totalWithTax = $total + ($total * 0.075);
    $totalWithTip = $totalWithTax + ($total * 0.16);
    ?>
    <tfoot>
        <tr>
            <td colspan="3">Итого:</td>
            <td><?=$total?> руб.</td>
            <td><?=$totalWithTax?> руб.</td>
            <td><?=$totalWithTip?> руб.</td>
        </tr>
    </tfoot>
</table>


