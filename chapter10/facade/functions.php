<?php
spl_autoload_register();
function getProductFileLines(string $file): array {

    return file($file);
}

function getProductObjectFromId(string $id, string $productname): Product {
    
    return new Product($id, $productname);
}

function getNameFromLine(string $line): string {

    if (preg_match("/.*-(.*)\s\d+/", $line, $array)) {
        return str_replace('_', ' ', $array[1]);
    }
    return '';
}

function getIDFromLine($line): int|string {

    if (preg_match("/^(\d{1,3})-/", $line, $array)) {
        return $array[1];
    }
    return -1;
}
?>