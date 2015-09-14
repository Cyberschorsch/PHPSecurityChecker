<?php

require __DIR__.'/vendor/autoload.php';

use SensioLabs\Security\SecurityChecker;
use Opale\PHPSecurityChecker\Engine;
use Opale\PHPSecurityChecker\Formatter;

$engine = new Engine(new SecurityChecker(), new Formatter());
$engine->run('/code');