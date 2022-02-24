<?php

require __DIR__ . "/vendor/autoload.php";

use App\Model\Teste;

$teste = Teste::selectById(3);

print_r($teste);

$teste->delete();

print_r($teste);