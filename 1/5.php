<?php
/**
 * Напишите на РНР программу, в которой применяются составные операции
 * инкрементирования (++) и умножения с присваиванием (*=), для вывода чисел в
 * пределах от 1 до 5, а также степеней числа 2 в пределах от 2 (21) до 32 (25).
 */

$i = 1;
while ($i <= 5) {
    echo $i++ . "<br>";
}
echo "<br>";

$number = 2;
for($i=2; $i <= 32; $i++)
{
    $number *= 2;
    echo "2^$i = $number<br>";
}
