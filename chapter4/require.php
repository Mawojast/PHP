<?php
require_once(__DIR__."/interface/interface.Chargeable.php");
require_once(__DIR__."/interface/interface.IdentityObject.php");

require_once(__DIR__."/abstract/abstract.ShopArticlePrinter.php");
require_once(__DIR__."/abstract/abstract.Service.php");
require_once(__DIR__."/abstract/abstract.DomainObject.php");

require_once(__DIR__."/trait/trait.IdentityTrait.php");
require_once(__DIR__."/trait/trait.PriceUtilities.php");
require_once(__DIR__."/trait/trait.TaxTools.php");

require_once(__DIR__."/class.User.php");
require_once(__DIR__."/class.Document.php");
require_once(__DIR__."/class.SpreadSheet.php");
require_once(__DIR__."/class.ShopArticle.php");
require_once(__DIR__."/class.BookArticle.php");
require_once(__DIR__."/class.CdArticle.php");
require_once(__DIR__."/class.ErrorPrinter.php");
require_once(__DIR__."/class.Shipping.php");
require_once(__DIR__."/class.StaticExample.php");
require_once(__DIR__."/class.TextArticlePrinter.php");
require_once(__DIR__."/class.UtilityService.php");
require_once(__DIR__."/class.XmlArticlePrinter.php");
?>