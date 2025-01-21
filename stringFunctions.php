<?php
function in_string(string $haystack, string $find, bool $sensetive = false): bool{

    $haystackLength = strlen($haystack);
    $findLength = strlen($find);

    if($findLength > $haystackLength) return false;

    if(!$sensetive){
        $find  = strtolower($find);
        $haystack  = strtolower($haystack);
    }

    for($i = 0; $i < $haystackLength - $findLength; $i++){

        $iFind = 0;
        while($iFind < $findLength && $haystack[$i + $iFind] == $find[$iFind]){
            $iFind++;
        }

        if($iFind == $findLength){
            return true;
        }
    }

    return false;
}
// $haystack = "Hello World";
// $find = "lo W";
// var_dump(str_contains($haystack, $find));

// var_dump(in_string($haystack, $find, false));

function separate_string(string $separator, string $string): array{

    if(!$separator) return [$string];

    $separatedString = [];
    $separatorLength = strlen($separator);
    $stringLength = strlen($string);

    $startSeparateIndex = 0;

    for($i = 0; $i < $stringLength - $separatorLength; $i++){
        $separatorCounter = 0;
        while($separatorCounter < $separatorLength && $string[$i + $separatorCounter] == $separator[$separatorCounter]){
            $separatorCounter++;
        }

        if($separatorCounter == $separatorLength){
            $separatedString[] = substr($string, $startSeparateIndex, $i-$startSeparateIndex);
            $startSeparateIndex = $i + $separatorLength;
        }
    }

    $separatedString[] = substr($string, $startSeparateIndex, $stringLength - $startSeparateIndex);
    return $separatedString;
}

// $string = "dasab iund die, d ab dieasd";
// var_dump(separate_string("", $string));
// var_dump(substr($string, 5, 13));

function substring_occurence(string $substring, string $string): int{

    $occurrence = 0;
    $substringLength = strlen($substring);
    $stringLength = strlen($string);

    for($i = 0; $i < $stringLength - $substringLength; $i++){
        $substringCounter = 0;
        while($substringCounter < $substringLength && $string[$i + $substringCounter] == $substring[$substringCounter]){
            $substringCounter++;
        }

        if($substringCounter == $substringLength){
            $occurrence++;
        }
    }

    return $occurrence;
}

// $string = "dasab iund die, d ab dieasd";
// var_dump(substring_occurence("d", $string));

function string_end_exists(string $string, string $end): bool{

    $stringLength = strlen($string);
    $endLength = strlen($end);

    if($endLength > $stringLength) return false;

    for($i = $stringLength - $endLength, $j = 0; $i < $stringLength; $i++, $j++){
        if($string[$i] != $end[$j]) return false;
    }

    return true;

}

var_dump(string_end_exists("dsakfj kfsdkdsfi dkd",""));

function replace_string(string $string, string $replace){

    $stringLength = strlen($string);
    $replaceLength = strlen($replace);

    $toReplaceIndexes = [];

    for($i = 0; $i < $stringLength - $replaceLength; $i++){
        $j = 0;
        while($j < $replaceLength && $string[$i + $j] == $replace[$j]){
            $j++;
        }

        if($j == $replaceLength){
            $toReplaceIndexes[] = ['start'=>$i, 'end'=> $i+$j-1];
        }
    }

    for($i = 0; $i < count($toReplaceIndexes); $i++){
        while($toReplaceIndexes[$i]['start'] <= $toReplaceIndexes[$i]['end']){
            
        }
    }
}

$string = "ab kdfiab kalfjab ab kdaabsjfaiab";
unset($string[3]);
replace_string($string, "ab");
?>