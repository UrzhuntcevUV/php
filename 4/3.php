<?php
/**
 * Разместите функцию из предыдущего упражнения в отдельном файле.
 * Затем создайте еще один файл, загружающий первый файл, используя его для
 * вывода на экран ряд дескрипторов .
 */

$GLOBALS['path'] = 'https://www.php.net/images/logos/';

require_once '3_function.php';

echo renderImg('php-logo.svg');