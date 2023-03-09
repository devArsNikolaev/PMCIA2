<?php
$students = ["Иванов"=>200, "Петров"=>340, "Сидоров"=>800];
$sum=0;
foreach ($students as $student => $money){
    echo "$student : $money ";
    $sum+= $money;
}
echo "</br>".$sum;

?>