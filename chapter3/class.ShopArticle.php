<?php
class ShopArticle {
    public $title = "default product";
    public $producerLastName = "last name";
    public $producerFirstName = "first name";
    public $price = 0;

}

$article1 = new ShopArticle();
$article2 = new ShopArticle();

$article1->title = "Mosona";
$article1->producerLastName = "Toast";
$article1->producerFirstName = "Johan";
$article1->price = 9.00;

echo "Written by {$article1->producerFirstName} "."{$article1->producerLastName}\n";
$article2->title = "NBC563";

print $article1->title;

$article1->notDeclaredPropertyInClass = "Cabin";
var_dump($article1);
//var_dump($article2);

?>