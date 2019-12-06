<?php

namespace Tests;

use App\ConsoleFormatter;
use App\Star;

class ConsoleFormatterTest extends BaseTestCase
{
    /** @test */
    function should_correctly_format_space_with_color()
    {
        $star = (new Star(5))->setSpaceChar('*');

        $cf = new ConsoleFormatter($star);
        $cf->setSpaceCharColor(ConsoleFormatter::GREEN);

        $spaceFormatted = $this->invokeMethod($cf, 'getSpaceCharWithColor', [ConsoleFormatter::GREEN]);
        $this->assertEquals($spaceFormatted,
            ConsoleFormatter::GREEN . '*' . ConsoleFormatter::CLOSE_TAG);
    }

    /** @test */
    function should_correctly_format_delimiter_with_color()
    {
        $star = (new Star(5))->setDelimChar('*');

        $cf = new ConsoleFormatter($star);
        $cf->setDelimCharColor(ConsoleFormatter::GREEN);


        $this->assertEquals(
            $this->invokeMethod($cf, 'getDelimCharWithColor', [ConsoleFormatter::GREEN]),
            ConsoleFormatter::GREEN . '*' . ConsoleFormatter::CLOSE_TAG
        );
    }

    /** @test */
    function should_correctly_format_decoration_with_color()
    {
        $star = (new Star(5))->setDecorationChar('*');

        $cf = new ConsoleFormatter($star);
        $cf->setDecorationCharColor(ConsoleFormatter::GREEN);

        $this->assertEquals(
            $this->invokeMethod($cf, 'getDecorationCharWithColor', [ConsoleFormatter::GREEN]),
            ConsoleFormatter::GREEN . '*' . ConsoleFormatter::CLOSE_TAG
        );
    }
}