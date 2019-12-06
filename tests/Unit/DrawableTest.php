<?php

namespace Tests;

use App\Shape;
use App\Star;
use InvalidArgumentException;

class DrawableTest extends BaseTestCase
{

    /** @test */
    function can_draw_line_with_decorator()
    {
        $star = $this->buildStar($height = 5);
        $actual = $this->invokeMethod($star, 'drawLine', [0, $height, true]);

        $this->assertEquals('+OOO+' . PHP_EOL, $actual);
    }

    /** @test */
    function can_draw_line_without_decorator()
    {
        $star = $this->buildStar($height = 5);
        $actual = $this->invokeMethod($star, 'drawLine', [0, $height]);

        $this->assertEquals('OOOOO' . PHP_EOL, $actual);
    }

    /** @test */
    function can_draw_single_pixel_in_middle()
    {
        $star = $this->buildStar($height = 5);
        $actual = $this->invokeMethod($star, 'drawLine', [2, 1]);

        $this->assertEquals('**O**' . PHP_EOL, $actual);
    }

    /** @test */
    function can_draw_decoration_line()
    {
        $star = $this->buildStar($height = 5);
        $actual = $this->invokeMethod($star, 'drawDecorationLine', ['#']);

        $this->assertEquals('***#***' . PHP_EOL, $actual);
    }

    /**
     * Factory function to generate Star object.
     * @param $height
     * @return Shape
     */
    private function buildStar($height)
    {
        return (new Star($height))
            ->setDelimChar('O')
            ->setSpaceChar('*')
            ->setDecorationChar('+');
    }

}