<?php
declare(strict_types=1);
class AddressManager {

    private $addresses = ["www.google.com", "www.netzpolitik.org"];

    public function printAddresses($resolve) {
       
        foreach ($this->addresses as $address) {
            print $address;
            if ($resolve) {
                print " (" . gethostbyname($address) . ")";
            }
            print "\n";
        }
    }

    public function printAddressesByHostname(bool $resolve) {
var_dump($resolve);
        foreach ($this->addresses as $address) {
            if (is_string($resolve)) {
                $resolve = (preg_match("/^(false|no|off)$/i", $resolve)) ? false : true;
            }
            if ($resolve) {
                print " (" . gethostbyname($address) . ")";
            }
            print "\n";
        }
    }
}

$settings = simplexml_load_file(__DIR__."/settings.xml");
$AddressManager = new AddressManager();
//$AddressManager->printAddresses((string)$settings->resolvedomains);
//$AddressManager->printAddressesByHostname((string)$settings->resolvedomains);
$AddressManager->printAddressesByHostname("true");
var_dump($settings->resolvedomains);
?>