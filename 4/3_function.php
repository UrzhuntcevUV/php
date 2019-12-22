<?php

function renderImg($filename)
{
    global $path;

    $url = $path . $filename;

    $img = '<img';
    $img .= " src=\"$url\"";

    $img .= '/>';

    return $img;
}
