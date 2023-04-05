<?php
spl_autoload_register();

$tile = new Plains();
$tile = new DiamondDecorator($tile);
echo $tile->getWealthFactor();
$tile = new PollutionDecorator($tile);
echo $tile->getWealthFactor();
///////////////////////////////////////////////

$process = new MainProcess();
$process = new LogRequest($process);
$process = new StructureRequest($process);
$process = new AuthenticateRequest($process);
?>