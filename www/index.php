<?php

// Uncomment this line if you must temporarily take down your site for maintenance.
// require '.maintenance.php';

$container = require __DIR__ . '/../Prerovan/bootstrap.php';

$container->getByType('Nette\Application\Application')->run();
