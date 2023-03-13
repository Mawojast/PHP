<?php
spl_autoload_register();

$EarthFactory = new TerrainFactory(
    new EarthSea(4),
    new EarthPlains(),
    new EarthForest()
);
?>