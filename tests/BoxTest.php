<?php

namespace WrapCalculatorTests;


use WrapCalculator\Box;

class BoxTest extends \PHPUnit_Framework_TestCase
{
    public function testTotalSurfaceArea()
    {
        $box = new Box();

        $box->setHeight(2);
        $box->setWidth(3);
        $box->setLength(4);

        $this->assertEquals(52, $box->getTotalSurfaceArea());
        $this->assertEquals(6, $box->getSurfaceAreaOfSmallestSide());
    }
}
