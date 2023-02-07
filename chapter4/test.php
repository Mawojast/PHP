<?php
require_once(__DIR__."/require.php");

$u = new UtilityService(100);
echo $u->getFinalPrice();
//echo $u->PriceUtiltiesCalculateTax(100);

//echo $u->calculateTax(100);
?>



