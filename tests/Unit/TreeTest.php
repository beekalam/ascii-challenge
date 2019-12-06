<?php

namespace Tests;

use App\Tree;

class TreeTest extends BaseTestCase
{
    /** @test */
    function should_return_correct_result_for_base_cases()
    {
        $this->assertEquals($this->tree_with_height_5(), $this->buildTree(5)->draw());
        $this->assertEquals($this->tree_with_height_7(), $this->buildTree(7)->draw());
        $this->assertEquals($this->tree_with_height_11(), $this->buildTree(11)->draw());
    }

    private function buildTree($height)
    {
        return (new Tree($height))
            ->setDelimChar('O')
            ->setSpaceChar('*')
            ->setDecorationChar('+');
    }

    private function tree_with_height_5()
    {
        return implode(PHP_EOL, [
            "***+***",
            "***O***",
            "**OOO**",
            "*OOOOO*",
            "OOOOOOO",
            ""
        ]);
    }

    private function tree_with_height_7()
    {
        return implode(PHP_EOL, [
            "*****+*****",
            "*****O*****",
            "****OOO****",
            "***OOOOO***",
            "**OOOOOOO**",
            "*OOOOOOOOO*",
            "OOOOOOOOOOO",
            ""
        ]);

    }

    private function tree_with_height_11()
    {
        return implode(PHP_EOL, [
            "********+********",
            "********O********",
            "*******OOO*******",
            "******OOOOO******",
            "*****OOOOOOO*****",
            "****OOOOOOOOO****",
            "***OOOOOOOOOOO***",
            "**OOOOOOOOOOOOO**",
            "*OOOOOOOOOOOOOOO*",
            "OOOOOOOOOOOOOOOOO",
            ""
        ]);
    }

}