<?php
require_once(__DIR__."/abstract.ShopArticlePrinter.php");
class XmlArticlePrinter extends ShopArticlePrinter {

    public function print(): void {
        
        $printer = new \XMLWriter();
        $printer->openMemory();
        $printer->startDocument('1.0', 'UTF-8');
        $printer->startElement("article");

        foreach( $this->article as $shopArticle ) {
            $printer->startElement("product");
            $printer->writeAttribute("title", $shopArticle->getTitle());
            $printer->startElement("info");
            $printer->text($shopArticle->getInfo());
            $printer->endElement();
            $printer->endElement();
        }

        $printer->endElement();
        $printer->endDocument();

        echo $printer->flush();
    }
}
?>