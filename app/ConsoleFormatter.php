<?php


namespace App;


class ConsoleFormatter
{
    private $shape;
    private $spaceCharColor = '';
    private $delimCharColor = '';
    private $decorationCharColor = '';

    public const RED = "\e[31m\e[31m";
    public const GREEN = "\e[32m\e[32m";
    public const YELLOW = "\e[33m\e[33m";
    public const BLUE = "\e[34m\e[34m";
    public const MAGENTA = "\e[35m\e[35m";
    public const CYAN = "\e[36m\e[36m";
    public const CLOSE_TAG = "\e[0m";

    /**
     * ConsoleFormatter constructor.
     * @param   $shape
     */
    public function __construct(Shape $shape)
    {
        $this->shape = $shape;
    }

    public function draw()
    {
        return $this->shape->setSpaceChar($this->getSpaceCharWithColor())
                           ->setDelimChar($this->getDelimCharWithColor())
                           ->setDecorationChar($this->getDecorationCharWithColor())
                           ->draw();
    }


    private function getSpaceCharWithColor()
    {
        return $this->getCharWithColor($this->shape->getSpaceChar(), $this->spaceCharColor);
    }

    private function getDelimCharWithColor()
    {
        return $this->getCharWithColor($this->shape->getDelimChar(), $this->delimCharColor);
    }

    private function getDecorationCharWithColor()
    {
        return $this->getCharWithColor($this->shape->getDecorationChar(), $this->decorationCharColor);
    }

    private function getCharWithColor($char, $color)
    {
        return empty($color) ? $char : $color . $char . self::CLOSE_TAG;
    }

    /**
     * @param string $decorationCharColor
     * @return ConsoleFormatter
     */
    public function setDecorationCharColor(string $decorationCharColor)
    {
        $this->decorationCharColor = $decorationCharColor;
        return $this;
    }

    /**
     * @param string $delimCharColor
     * @return ConsoleFormatter
     */
    public function setDelimCharColor(string $delimCharColor)
    {
        $this->delimCharColor = $delimCharColor;
        return $this;
    }

    /**
     * @param string $spaceCharColor
     * @return ConsoleFormatter
     */
    public function setSpaceCharColor(string $spaceCharColor)
    {
        $this->spaceCharColor = $spaceCharColor;
        return $this;
    }

    public static function randomColor()
    {
        $arr = [
            ConsoleFormatter::RED,
            ConsoleFormatter::BLUE,
            ConsoleFormatter::YELLOW,
            ConsoleFormatter::GREEN,
            ConsoleFormatter::MAGENTA,
            ConsoleFormatter::CYAN
        ];
        return $arr[array_rand($arr)];
    }

}