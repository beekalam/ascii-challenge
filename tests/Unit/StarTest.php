<?php

namespace Tests;

use App\Star;
use InvalidArgumentException;

class StarTest extends BaseTestCase
{

    /** @test */
    function should_throw_exception_for_even_height_values()
    {
        $this->expectException(InvalidArgumentException::class);
        new Star(6);
    }

    /** @test */
    function should_calculate_correct_width()
    {
        $this->assertEquals(7, $this->buildStar(5)->getWidth());
        $this->assertEquals(11, $this->buildStar(7)->getWidth());
        $this->assertEquals(17, $this->buildStar(11)->getWidth());
        $this->assertEquals(27, $this->buildStar(15)->getWidth());
    }

    /** @test */
    function should_return_correct_results_for_base_cases()
    {
        $this->assertEquals(
            $this->star_with_height_5(),
            $this->buildStar(5)->draw()
        );

        $this->assertEquals(
            $this->star_with_height_7(),
            $this->buildStar(7)->draw()
        );

        $this->assertEquals(
            $this->star_with_height_11(),
            $this->buildStar(11)->draw()
        );
    }

    /**
     * Factory function to generate Star object.
     * @param $height
     * @return Star
     */
    private function buildStar($height)
    {
        return (new Star($height))
            ->setDelimChar('O')
            ->setSpaceChar('*')
            ->setDecorationChar('+');
    }

    private function star_with_height_5()
    {
        return implode(PHP_EOL, [
            '***+***',
            '***O***',
            '+OOOOO+',
            '***O***',
            '***+***',
            ''
        ]);
    }

    private function star_with_height_7()
    {
        return implode(PHP_EOL, [
            '*****+*****',
            '*****O*****',
            '***OOOOO***',
            '+OOOOOOOOO+',
            '***OOOOO***',
            '*****O*****',
            '*****+*****',
            ''
        ]);

    }

    private function star_with_height_11()
    {
        return implode(PHP_EOL, [
            '********+********',
            '********O********',
            '*******OOO*******',
            '*****OOOOOOO*****',
            '***OOOOOOOOOOO***',
            '+OOOOOOOOOOOOOOO+',
            '***OOOOOOOOOOO***',
            '*****OOOOOOO*****',
            '*******OOO*******',
            '********O********',
            '********+********',
            ''
        ]);
    }


}