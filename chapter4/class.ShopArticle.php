<?php
class ShopArticle {

    private int|float $discount = 0;
    private int $id = 0;

    public function __construct(
        private string $title, 
        private string $firstName = "", 
        private string $lastName = "", 
        protected int|float $price = 0.00
        ){}

    public static function getInstance(int $id, $mysqli): ArticleProduct {
        if ($mysqli->connect_errno) {
            exit('nope mysqli connection');
        }
        $stmt = $mysqli->stmt_init();

        $stmt->prepare("select * from articles where id=?");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        var_dump($result);
        $row = $result->fetch();

        var_dump($row);
        if ( empty($row)) {
            return null;
        }

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

    public function getPrice(): int|float {

        return ($this->price - $this->discount);
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
}

$mysqli = new mysqli('localhost', 'root', '', 'php8objectspatternsandpractice');
//$obj = 
ShopArticle::getInstance(1, $mysqli);
?>