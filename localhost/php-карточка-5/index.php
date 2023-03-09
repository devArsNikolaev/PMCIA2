<?php
$s1 = "  I love Belarus";
$s2 = "I study in Grodno State Polytechnical College";
$len = mb_strlen($s2);
echo "Длина строки s2 = ".$len;
echo " 12-й символ строки s1 = ".$s1[12];

echo str_replace("Belarus", "Grodno", $s1);


?>