<?php

namespace Tests;

use App\Shape;
use InvalidArgumentException;

class ShapeTest extends BaseTestCase
{
    /** @test */
    function should_throw_exception_for_none_numeric_height()
    {
        $this->expectException(InvalidArgumentException::class);
        new Shape('bad input');
    }
}