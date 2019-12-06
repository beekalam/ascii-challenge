<?php
require __DIR__ . "/vendor/autoload.php";

use App\HTMLFormatter;
use App\Star;
use App\Tree;

if ($_GET['shape'] == 'star') {
    $shape = new Star($_GET['star-size'] ?? 5);
} else {
    $shape = new Tree($_GET['tree-size'] ?? 5);
}
$shape->setDelimChar(empty($_GET['delim']) ? 'X' : $_GET['delim'])
      ->setSpaceChar(empty($_GET['space']) ? ' ' : $_GET['space'])
      ->setDecorationChar(empty($_GET['decoration']) ? '+' : $_GET['decoration']);

$htmlFormatter = new HTMLFormatter($shape);
$htmlFormatter->setDelimCharColor($_GET['delim-color'] ?? '')
              ->setDecorationCharColor($_GET['decoration-color'] ?? '')
              ->setSpaceCharColor($_GET['space-color'] ?? '')
              ->setFontSize($_GET['font-size'] ?? 12);

echo $htmlFormatter->draw();
