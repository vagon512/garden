<?php
include_once 'class/Garden.php';

$myGarden = new Garden();
$i = 0;
$countTrees = [];
//высадка 25 деревьев
while(count($countTrees) < 25){
    $countTrees = $myGarden->AddTrees(count($countTrees));
    $i++;
}

//Сбор фруктов и сортировка по ящикам
$fruitBox = $myGarden->PickFruit($countTrees);
$fruitWeight = $myGarden->getWeigth($countTrees)/1000;
echo "Собрано яблок: ".$fruitBox['apple']."\n";
echo "Собрано груш: ".$fruitBox['pear']."\n";
echo "Всего собрано ".$fruitWeight." кг фруктов\n";
//print_r($countTrees);