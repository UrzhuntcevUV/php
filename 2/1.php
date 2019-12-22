<?php
/**
 * Определите истинность или ложность приведенных ниже выражений,
 * не прибегая к помощи интерпретатора РНР. После решения убедитесь на практике.
 * а. 100. 00 - 100
 * Ь. "zero"
 * с. "false"
 * d. 0 + "true"
 * е. 0.000
 * f. "0.0"
 * g. strcmp ("false", "False")
 * h. 0 <=> "0"
 */

echo "100.00 - 100 - false<br>";
var_dump((bool) (100.00 - 100));
echo "<br><br>";

echo '"zero" - true<br>';
var_dump((bool) "zero");
echo "<br><br>";


echo '"false" - true<br>';
var_dump((bool) "false");
echo "<br><br>";


echo '0 + "true" - false<br>';
var_dump((bool) (0 + "true"));
echo "<br><br>";

echo '0.000 - false<br>';
var_dump((bool) 0.000);
echo "<br><br>";

echo '0.0 - false<br>';
var_dump((bool) 0.000);
echo "<br><br>";

echo 'strcmp("false", "False") - true<br>';
var_dump((bool) strcmp("false", "False"));
echo "<br><br>";

echo '0 <=> "0" - false<br>';
var_dump((bool) (0 <=> "0"));
echo "<br><br>";
