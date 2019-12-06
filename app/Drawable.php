<?php


namespace App;


trait Drawable
{

    /** Draws a line with single character in the middle.
     * @param $char
     * @return string
     */
    protected function drawDecorationLine($char)
    {
        if ($this->width % 2 == 1) {
            $halfLine = str_repeat($this->getSpaceChar(), ($this->getWidth() - 1) / 2);
            return "{$halfLine}{$char}{$halfLine}" . PHP_EOL;
        } else {
            $halfLine = str_repeat($this->getSpaceChar(), ($this->getWidth() - 2) / 2);
            return "{$this->getSpaceChar()}{$halfLine}{$char}{$halfLine}" . PHP_EOL;
        }
    }

    /**
     * Draws a line given number of spaces and delimiter.
     * @param      $spaceCount
     * @param      $delimCount
     * @param bool $withDecorator
     * @return string
     */
    protected function drawLine($spaceCount, $delimCount, $withDecorator = false)
    {
        $spaces = $spaceCount > 0 ? str_repeat($this->getSpaceChar(), $spaceCount) : '';

        if ($withDecorator) {
            $delimCount -= 2;
            $delims = $this->getDecorationChar() . str_repeat($this->getDelimChar(), $delimCount) . $this->decorationChar;
        } else {
            $delims = str_repeat($this->getDelimChar(), $delimCount);
        }
        return "{$spaces}{$delims}{$spaces}" . PHP_EOL;
    }
}