<?php
/**
 * Напишите на РНР программу, вычисляющую общую стоимость трапезы в ресторане,
 * состоящей из двух гамбургеров по 49,5 рубля каждый,
 * одного молочно-шоколадного коктейля за 19,5 рубля и
 * одной порции кока-колы за 8,5 рубля.
 * Ставка налога на добавленную стоимость составляет 7,5%,
 * а чаевые без вычета налогов — 16%.
 */

$hamburgerPrice = 49.5;
$coctailPrice = 19.5;
$cocaColaPrice = 8.5;

$tax = 7.5;
$tip = 16;

$total = $hamburgerPrice * 2 + $coctailPrice + $cocaColaPrice;
$totalWithTax = $total + ($total * 0.075);
$totalWithTip = $totalWithTax + ($total * 0.16);

echo "Сумма: $total руб.<br>";
echo "Сумма c налогом: $totalWithTax руб.<br>";
echo "Сумма c налогом и чаевыми: $totalWithTip руб.<br>";
