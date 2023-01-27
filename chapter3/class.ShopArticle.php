<?php
class ShopArticle {
    /*
    public $title = "default product";
    public $producerLastName = "last name";
    public $producerFirstName = "first name";
    public $price = 0;
    */
    public function __construct(
        public string $title, 
        public string $firstName = "", 
        public string $lastName = "", 
        public float $price = 0.00){
    }

    public function getProducerName(): string{
        return $this->producerFirstName . " " . $this->producerLastName;
    }

}

$article1 = new ShopArticle("Mosona", "Johan", "Toast", 8.00);
//$article2 = new ShopArticle();
$article3 = new ShopArticle("Coupon");
$article4 = new ShopArticle(price: 1.99, title: "Coupon");

$article1->title = "Mosona";
$article1->producerLastName = "Toast";
$article1->producerFirstName = "Johan";
$article1->price = 8.00;

echo "Written by {$article1->producerFirstName} "."{$article1->producerLastName}\n";
print "Producer: {$article1->getProducerName()}\n";
//$article2->title = "NBC563";

var_dump(print $article1->title);

$article1->notDeclaredPropertyInClass = "Cabin";
//var_dump($article1);
//var_dump($article2);

?>