<?php


namespace App;


use InvalidArgumentException;

class Shape
{
    /**
     * @var string character to use for space.
     */
    protected $spaceChar = ' ';
    protected $decorationChar = '+';
    protected $delimChar = 'X';
    protected $width;
    protected $height;

    public const SMALL = 5;
    public const MEDIUM = 7;
    public const LARGE = 11;

    /**
     * Shape constructor.
     * @param $height
     */
    public function __construct($height)
    {
        if (!is_numeric($height))
            throw new InvalidArgumentException('Invalid value for height.');

        $this->height = $height;
    }

    /**
     * Character for empty space.
     * @param string $spaceChar
     * @return Shape
     */
    public function setSpaceChar($spaceChar)
    {
        $this->spaceChar = $spaceChar;
        return $this;
    }

    /**
     * Character for decorations.
     * @param string $decorationChar
     * @return Shape
     */
    public function setDecorationChar($decorationChar)
    {
        $this->decorationChar = $decorationChar;
        return $this;
    }

    /**
     * Character for filling the shape.
     * @param string $delimChar
     * @return Shape
     */
    public function setDelimChar($delimChar)
    {
        $this->delimChar = $delimChar;
        return $this;
    }

    /**
     * @return string
     */
    public function getDelimChar()
    {
        return $this->delimChar;
    }

    /**
     * @return string
     */
    public function getDecorationChar()
    {
        return $this->decorationChar;
    }

    /**
     * @return string
     */
    public function getSpaceChar()
    {
        return $this->spaceChar;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return int|string
     */
    public function getHeight()
    {
        return $this->height;
    }

    public static function randomSize()
    {
        $arr = [
            self::SMALL,
            self::MEDIUM,
            self::LARGE
        ];
        return $arr[array_rand($arr)];
    }
}