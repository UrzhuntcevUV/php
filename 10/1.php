<?php
/**
 * По адресу http://php.net/releases/?json находится лента подачи информации в
 * формате JSON о последних выпусках версий языка РНР. Напишите программу,
 * в которой функция file_get_contents() используется для извлечения из этой
 * ленты и последующего вывода на экран информации о последней выпущенной версии
 * языка РHP.
 */

$url = 'http://php.net/releases/?json';
$json = file_get_contents($url);
$releases = json_decode($json, true);
?>
<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>version</th>
        <th>date</th>
        <th>source</th>
    </tr>
    <?foreach ($releases as $release):?>
        <tr>
            <td><?=$release['version']?></td>
            <td><?=$release['date']?></td>
            <td>
                <?foreach ($release['source'] as $source):?>
                    <a href="https://www.php.net/distributions/<?=$source['filename']?>"><?=$source['name']?></a>
                    <br>
                <?endforeach?>

                <?if (!empty($release['windows'])):?>
                    <?foreach ($release['windows'] as $source):?>
                        <a href="https://www.php.net/distributions/<?=$source['filename']?>"><?=$source['name']?></a>
                        <br>
                    <?endforeach?>
                <?endif?>
            </td>
        </tr>
    <?endforeach?>
</table>
