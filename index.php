<?php

function sumIntervals(array $array = array()){
    $arrMergeIntervals = [];
    foreach ($array as $i => $interval){
        foreach ($array as $ic => $compare){
            //ищем пересечения
            if(!($compare[0] > $interval[1] || $interval[0] < $compare[1])){
                if(!in_array($compare[0], $arrMergeIntervals))
                    $arrMergeIntervals[] = $compare[0];
                if(!in_array($compare[1], $arrMergeIntervals))
                    $arrMergeIntervals[] = $compare[1];
                unset($array[$ic]);
            }
        }
    }
    $sum = 0;
    if(sizeof($arrMergeIntervals)){
        sort($a);
        $sum = max($arrMergeIntervals) - $arrMergeIntervals[0];
    }
    foreach ($array as $item)
        $sum += $item[1] - $item[0];
    return $sum;
}
echo 'Массив<br>';
$int = [[1,4],[7,10],[3,5],[11,13],[5,9]];
echo '<pre>';
print_r($int);
echo '</pre>';
echo 'Значение<br>';
echo sumIntervals([[1,4],[7,10],[3,5],[11,13],[5,9]]);