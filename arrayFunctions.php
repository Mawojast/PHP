<?php

/**
 * behaves like the PHP function array_flip
 * @param array $arr
 * @return array
 */
function flip_array(array $arr): array{

    foreach($arr as $key => $value){    
        //Only strings and integers are valid array key otherwise warning error will be triggered
        if(is_string($value) || is_int($value)){
            $temp = $key;
            $key = $value;
            $value = $temp;

            unset($arr[$value]);
            $arr[$key] = $value;
        }else{
            unset($arr[$key]);
            $warningValueTypeError = true;
        }
    }

    return $arr;
}

// $input = ["a" => 1, "b" => 1, "c" => 2, "d" => true];
// $swapped = flip_array($input);
// print_r($swapped);

/**
 * behaves like the PHP function array_flip
 * @param array $arr
 * @return array
 */
function count_array_values(array $arr): array{

    foreach($arr as $key => $value){
        if(!is_string($value) && !is_int($value)){
            unset($arr[$key]);
            continue;
        }

        if(isset($arr[$value])){
            $arr[$value]++;
        }else{
            $arr[$value] = 1;
        }

        unset($arr[$key]);
    }
    return $arr;
}

// var_dump(count_array_values([]));

/**
 * behaves like the PHP function array_combine
 * @param array $keys
 * @param array $values
 * @return array
 */
function combine_array(array $keys, array $values): array{

    $combineArray = [];
    $combiningKeys = [];
    $combiningValues = [];

    if(count($keys) != count($values)){
        trigger_error("Arrays must have same count values", E_USER_ERROR);
    }

    foreach($keys as $value){
        if(!is_int($value) || !is_string($value)){
            $key = (string)$value;
            $combiningKeys[] = $key;           
        }else{
            $combiningKeys[] = $value;
        }
    }

    foreach($values as $value){
        $combiningValues[] = $value;
    }

    for($i = 0; $i < count($keys); $i++){
        $combineArray[$combiningKeys[$i]] = $combiningValues[$i];
    }

    return $combineArray;
}

$a = [4,"a"=>5,75,4, false, [4]];
$b = ["b"=>34,56,33,4,true,33];

// var_dump(array_combine($a, $b));

// 
/**
 * appends new value to array by given index
 * illegal values for key will be converted to string
 * if the array value have the same string key it will return false
 * @param array $arr
 * @param mixed $value
 * @param mixed $index
 * @return bool
 */
function array_append(array &$arr, mixed $value, mixed $index): bool{

    $index = (is_int($index) || is_string($index)) ? $index : (string)$index;
    
    if(is_int($index)){

        if($index >= count($arr) || $index < 0) return false;

        $intKeys = [];
        foreach($arr as $key => $val){
            if(is_int($key) && $key >= $index){
                $intKeys[] = $key;
            }
        }
        for($i = count($intKeys)-1; $i >= 0; $i--){
            $arr[$intKeys[$i] + 1] = $arr[$intKeys[$i]];
        }
        $arr[$index] = $value;
    }

    if(is_string($index)){

        if(isset($arr[$index])) return false;
        $arr[$index] = $value;
    }

    return true;
}

$arrAppend = [1,2,3,"a" => "kjkj",5,5,8];
array_append($arrAppend, 34, false);
var_dump($arrAppend);


?>