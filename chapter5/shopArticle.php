<?php
class ShopArticle implements Chargeable, IdentityObject  {

    use PriceUtilities;
    use IdentityTrait;

    public const AVAILABLE = 0;
    public const OUT_OF_STOCK = 1;

    private int|float $discount = 0;
    private int $id = 0;

    //protected float $price;

    public function __construct(
        private string $title, 
        private string $firstName = "", 
        private string $lastName = "", 
        protected float $price = 0.00
        ){}

    public function getTaxRate(): float {
    
        return 20;
    }

    public static function getInstance(int $id, $mysqli) {
        if ($mysqli->connect_errno) {
            exit('nope mysqli connection');
        }
        $stmt = $mysqli->stmt_init();

        $stmt->prepare("select * from articles where id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        

        $result = $stmt->get_result();
        $row = $result->fetch_array();

        if ( $row['type'] == "book" ) {
            $article = new BookArticle(
                $row['title'],
                $row['firstname'],
                $row['lastname'],
                (float) $row['price'],
                (int) $row['numpages']
            );
        } elseif ( $row['type'] == "cd" ) {
            $article = new CdArticle(
                $row['title'],
                $row['firstname'],
                $row['lastname'],
                (float) $row['price'],
                (float) $row['playlength']
            );
        } else {
            $firstname = (is_null($row['firstname'])) ? "" : $row['firstname'];
            $article = new ArticleShop(
                $row['title'],
                $firstname,
                $row['lastname'],
                (float) $row['price']
            );
        }

        $article->setId( (int) $row['id'] );
        $article->setDiscount( (int) $row['id']);
        $article->setDiscount( (int) $row['discount']);
        
        return $article;

    }

    public function setID(int $id): void {

        $this->id = $id;
    }

    public function getFirstName() {

        return $this->firstName;
    }

    public function getLastName() {

        return $this->lastName;
    }

    public function getProducerName(): string{

        return $this->firstName . " " . $this->lastName;
    }

    public function getPlayLength(): int {

        return $this->playLength;
    }

    public function getPrice(): float {

        return $this->price;
    }

    public function setDiscount(float|int $num): void {

        $this->discount = $num;
    }

    public function getNumberOfPages(): int {

        return $this->numPages;
    }

    public function getInfo(): string {

        $info = "{$this->title} - {$this->lastName}, ";
        $info .= "{$this->firstName}";

        return $info;
    }

    public static function storeIdentityObject(IdentityObject $identityObject) {}
}

//$mysqli = new mysqli('localhost', 'root', '', 'php8objectspatternsandpractice');


//echo ShopArticle::AVAILABLE;
?>