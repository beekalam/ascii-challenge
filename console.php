<?php

use App\ConsoleFormatter;
use App\Shape;
use App\Star;
use App\Tree;

require __DIR__ . "/vendor/autoload.php";

function drawStar()
{
    $star = new Star(Shape::randomSize());
    echo $star->draw();
}

function drawStarWithCustomChars()
{
    $star = new Star(Shape::randomSize());
    echo $star->setSpaceChar('*')
              ->setDecorationChar('+')
              ->setDelimChar('O')
              ->draw();
}

function drawStarWithColors()
{
    $star = new Star(Shape::randomSize());
    $cf = new ConsoleFormatter($star);
    echo $cf->setSpaceCharColor(ConsoleFormatter::randomColor())
            ->setDecorationCharColor(ConsoleFormatter::randomColor())
            ->setDelimCharColor(ConsoleFormatter::randomColor())
            ->draw();

}

function drawTree()
{
    $tree = new Tree(Shape::randomSize());
    echo $tree->draw();
}

drawStar();
// drawStarWithCustomChars();
// drawStarWithColors();
// drawTree();




