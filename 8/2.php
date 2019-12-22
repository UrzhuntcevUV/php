<?php
/**
 * Создайте вне интерпретатора РНР новый файл, содержащий ряд адресов
 * электронной почты в отдельных строках, причем некоторые адреса должны
 * присутствовать в файле неоднократно. Присвойте новому файлу имя
 * addresses.txt. Затем напишите на РНР программу, читающую каждую строку из
 * файла addresses.txt и подсчитывающую, сколько раз каждый адрес упоминается
 * в данном файле. Для каждого адреса из файла addresses.txt эта программа
 * должна записывать отдельную строку в другой файл, называемый
 * addresses-count.txt. Каждая строка из файла addresses-count.txt
 * должна состоять из числа, обозначающего, сколько раз данный адрес
 * упоминается в файле addresses.txt, запятой и самого адреса электронной почты.
 * Такие строки должны записываться в файл addresses-count.txt в отсортированном
 * порядке, начиная с адреса, чаще всего упоминаемого в файле addresses.txt, и
 * кончая адресом, реже всего упоминаемым в файле addresses.txt.
 */

$path = __DIR__ . '/addresses.txt';
$savePath = __DIR__ . '/addresses-count.txt';

$addresses = [];

$handle = fopen($path, 'r');
while ($row = fgets($handle)) {
    if (isset($addresses[$row])) {
        $addresses[$row]++;
    } else {
        $addresses[$row] = 1;
    }
}
fclose($handle);

arsort($addresses);
$handle = fopen($savePath, 'w');
foreach ($addresses as $address => $count) {
    $str = $count . ',' . $address;
    fwrite($handle, $str);

    echo $str . '<br>';
}
fclose($handle);
