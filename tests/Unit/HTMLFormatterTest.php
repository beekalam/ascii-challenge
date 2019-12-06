<?php

namespace Tests;

use App\ConsoleFormatter;
use App\HTMLFormatter;
use App\Star;

class HTMLFormatterTest extends BaseTestCase
{
    /** @test */
    function should_correctly_format_space_with_color()
    {
        $star = (new Star(5))->setSpaceChar('*');

        $hf = new HTMLFormatter($star);
        $hf->setSpaceCharColor('red');

        $spaceFormatted = $this->invokeMethod($hf, 'buildSpaceSpan');
        $this->assertEquals($spaceFormatted,"<span style='color:red;'>*</span>");
    }

    /** @test */
    function should_correctly_format_delim_with_color()
    {
        $star = (new Star(5))->setDelimChar('*');

        $hf = new HTMLFormatter($star);
        $hf->setDelimCharColor('red');

        $spaceFormatted = $this->invokeMethod($hf, 'buildDelimSpan');
        $this->assertEquals($spaceFormatted,"<span style='color:red;'>*</span>");
    }

    /** @test */
    function should_correctly_format_decoration_with_color()
    {
        $star = (new Star(5))->setDecorationChar('*');

        $hf = new HTMLFormatter($star);
        $hf->setDecorationCharColor('red');

        $spaceFormatted = $this->invokeMethod($hf, 'buildDecorationSpan');
        $this->assertEquals($spaceFormatted,"<span style='color:red;'>*</span>");
    }
}