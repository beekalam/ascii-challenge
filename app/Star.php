<?php


namespace App;


use InvalidArgumentException;

class Star extends Shape
{
    use Drawable;
    /**
     * @var string
     */
    public $resultString = '';

    public function __construct($height)
    {
        if ($height % 2 == 0)
            throw new InvalidArgumentException('Only odd height values are accepted.');

        parent::__construct($height);
        $this->width = $this->calculateWidth();
    }

    private function calculateWidth()
    {
        $width = 1;

        // half of the star height without the middle line
        $halfOfHeight = floor($this->height / 2) - 1;

        // from the top of star, if we have a height that is dividable by 4
        // we add 2 delimiter characters, otherwise 4 delimiters
        $width += $halfOfHeight % 4 == 0 ? 2 : 4;
        $halfOfHeight--;

        // every step except the last, we add 4 delimiters
        $width += ($halfOfHeight - 1) * 4;

        // for last line we add 4 delimiters  plus 2 decoration chars(+)
        $width += 6;
        return $width;
    }

    public function draw()
    {
        // middle line in star
        $this->resultString = $this->drawLine(0, $this->width, true);
        $height = $this->height - 1;

        // count of spaces & delimiter characters for next iteration
        $spaceCount = 3;
        $delims = $this->width - 6;

        while ($height >= 0) {
            // if this is the penultimate line
            if ($height <= 4) {
                $this->addLine($this->drawDecorationLine($this->delimChar));
                break;
            }
            $this->addLine($this->drawLine($spaceCount, $delims));
            $height -= 2;
            if ($delims - 4 < 0) {
                $delims -= 2;
                $spaceCount += 1;
            } else {
                $delims -= 4;
                $spaceCount += 2;
            }
        }
        $this->addLine($this->drawDecorationLine($this->decorationChar));
        return $this->resultString;
    }

    /**
     * Prepend and append the given line to the result.
     * @param $line
     */
    public function addLine($line)
    {
        $this->resultString = "{$line}{$this->resultString}{$line}";
    }

}