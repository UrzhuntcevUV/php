<?php
/**
 * Выясните результат, выводимый приведенной ниже программой, не прибегая к
 * помощи интерпретатора РНР. После решения убедитесь на практике.
 *
 * Будет выведено "Message З." и "Age : 12 . Shoe Size: 14"
 */
$age = 12;
$shoe_size = 13;
if ($age > $shoe_size) {
    print_r("Message 1.");
} elseif (($shoe_size++) && ($age > 20)) {
    print "Message 2.";
} else {
    print "Message З.";
}
print "Age : $age . Shoe Size: $shoe_size";