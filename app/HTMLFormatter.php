<?php


namespace App;


class HTMLFormatter
{

    private $shape;
    private $delimCharColor;
    private $spaceCharColor;
    private $decorationCharColor;
    private $fontSize;

    /**
     * HTMLFormatter constructor.
     */
    public function __construct(Shape $shape)
    {
        $this->shape = $shape;
    }


    public function draw()
    {
        $str = $this->shape->setSpaceChar($this->buildSpaceSpan())
                           ->setDelimChar($this->buildDelimSpan())
                           ->setDecorationChar($this->buildDecorationSpan())
                           ->draw();

        return "<pre style='overflow: visible;'>$str</pre>";
    }

    private function buildDelimSpan()
    {
        $style = $this->getFontStyle();
        if (!empty($this->delimCharColor))
            $style .= "color:{$this->delimCharColor};";

        return "<span style='{$style}'>{$this->shape->getDelimChar()}</span>";
    }

    private function buildSpaceSpan()
    {
        $style = $this->getFontStyle();
        if (!empty($this->spaceCharColor))
            $style .= "color:{$this->spaceCharColor};";

        return "<span style='{$style}'>{$this->shape->getSpaceChar()}</span>";
    }


    private function buildDecorationSpan()
    {
        $style = $this->getFontStyle();
        if (!empty($this->decorationCharColor))
            $style .= "color:{$this->decorationCharColor};";

        return "<span style='{$style}'>{$this->shape->getDecorationChar()}</span>";
    }

    public function setDelimCharColor($color)
    {
        $this->delimCharColor = $color;
        return $this;
    }

    /**
     * @param mixed $spaceCharColor
     * @return HTMLFormatter
     */
    public function setSpaceCharColor($spaceCharColor)
    {
        $this->spaceCharColor = $spaceCharColor;
        return $this;
    }

    /**
     * @param mixed $decorationCharColor
     * @return HTMLFormatter
     */
    public function setDecorationCharColor($decorationCharColor)
    {
        $this->decorationCharColor = $decorationCharColor;
        return $this;
    }

    /**
     * @param mixed $fontSize
     * @return HTMLFormatter
     */
    public function setFontSize($fontSize)
    {
        $this->fontSize = $fontSize;
        return $this;
    }

    /**
     * @return string
     */
    private function getFontStyle(): string
    {
        $style = '';
        if (!empty($this->fontSize))
            $style = "font-size:{$this->fontSize}px;";
        return $style;
    }


}