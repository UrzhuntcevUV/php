<?php
/**
 * Напишите функцию, возвращающую дескриптор  разметки НТМL страницы.
 * Эта функция должна принимать URL изображения в качестве обязательного
 * аргумента, а также текст надписи, ширину и высоту изображения в качестве
 * необязательных аргументов alt, height и width соответственно.
 */

function renderImg($url, $alt='', $width=0, $height=0)
{
    $img = '<img';
    $img .= " src=\"$url\"";

    if (!empty($alt)) {
        $img .= "alt=\"$alt\"";
    }

    if (!empty($width)) {
        $img .= " width=\"$width\"";
    }

    if (!empty($height)) {
        $img .= " height=\"$height\"";
    }

    $img .= '/>';

    return $img;
}

echo renderImg('https://www.php.net/images/logos/php-logo.svg', 'test1', 100, 100);
echo renderImg('https://www.php.net/images/logos/php-logo.svg', 'test2', 100);
echo renderImg('https://www.php.net/images/logos/php-logo.svg', 'test3');
echo renderImg('https://www.php.net/images/logos/php-logo.svg');