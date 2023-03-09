<?php

function e($x, $y){
    echo "Ответ: ".( sqrt(abs($x - 1))-sqrt(abs(3.14-$x)) ) / ( 1 + $x*$x/2 + $y*$y/4 );
}


e(1, 4);

?>
