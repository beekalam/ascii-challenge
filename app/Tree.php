<?php

namespace App;


class Tree extends Shape
{
    use Drawable;

    private $resultString = '';

    public function __construct($height)
    {
        parent::__construct($height);
        $width = intval($height / 2);
        $this->width = $this->height + ($width / 2 == 1 ? $width : $width + 1);
    }

    public function draw()
    {
        $this->resultString = '';
        $height = $this->height;
        $spaceCount = 0;
        $delimCount = $this->width;
        while ($height > 0) {
            if ($delimCount <= 2) {
                $this->addLine($this->drawDecorationLine($this->getDelimChar()));
                break;
            }
            $this->addLine($this->drawLine($spaceCount, $delimCount));
            $delimCount -= 2;
            $spaceCount += 1;
            $height--;
        }
        $this->addLine($this->drawDecorationLine($this->getDecorationChar()));
        return $this->resultString;
    }

    private function addLine($line)
    {
        $this->resultString = "{$line}{$this->resultString}";
    }
}