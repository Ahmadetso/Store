<?php 
    function mergesort($array) {

    if (count($array) < 2) return $array;

    $middle = (int)(count($array) / 2);

    $left = array_slice($array, 0, $middle);
    $right = array_slice($array, $middle);

    return merge(mergeSort($left), mergeSort($right));
}
function merge($left, $right) {
    $sorted = [];

    while ($left && $right) {
        if ($left[0] <= $right[0]) {
            $sorted[] = array_shift($left);
        } else {
            $sorted[] = array_shift($right);
        }
    }
    return array_merge($sorted, $left, $right);
}
$array = [4,3,2,1];
$sortedArray = mergeSort($array);
print_r($sortedArray);
