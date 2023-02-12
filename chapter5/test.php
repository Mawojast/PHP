<?php
namespace main;
include(__DIR__."/popp/chapter05/batch04/util/class.Debug.php");
include(__DIR__."/popp/chapter05/batch04/util/class.TreeLister.php");

include(__DIR__."/popp/class.TreeLister.php");
include(__DIR__."/popp/chapter05/batch04/class.Debug.php");

use popp\chapter5\batch04\util\Debug;
use popp\chapter5\batch04\util\TreeLister;
use popp\chapter5\batch04\Debug as CoreDebug;


Debug::helloWorld();
CoreDebug::helloWorld();
TreeLister::helloWorld();

namespace popp\chapter5\batch04;

use popp\chapter5\batch04\util\TreeLister;
echo "-----New Namespce---------\n";
TreeLister::helloWorld();
\TreeLister::helloWorld();