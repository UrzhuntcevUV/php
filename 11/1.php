<?php
/**
 * В следующей программе содержится синтаксическая ошибка:
 * <?php
 * $name = 'UmЬerto ';
 * function say_hello() {
 *     print 'Hello, ';
 *     print global $name;
 * }
 * say_hello();
 * ?>
 *
 * Не выполняя программу в интерпретаторе РНР, выясните, о какой ошибке должен
 * сообщить этот интерпретатор при попытке выполнить программу. Какие изменения
 * следует внести в данную программу, чтобы она выполнялась правильно и выводила
 * на экран сообщение "Hello, UmЬerto"?
 *
 * Ошибка в строке "print global $name;"
 * Или выше в функции объявить "global $name;" или заменить на
 * "print $GLOBALS['name'];"
 */

$name = 'UmЬerto ';

function say_hello() {
    global $name;

    print 'Hello, ';
    print $name;
}

say_hello();