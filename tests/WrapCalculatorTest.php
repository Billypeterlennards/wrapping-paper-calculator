<?php
namespace WrapCalculatorTests;

use WrapCalculator\Box;
use WrapCalculator\WrapCalculator;

class WrapCalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testTotalSurfaceArea()
    {
        $wrapCalculator = new WrapCalculator();

        $box = new Box();

        $box->setHeight(2);
        $box->setWidth(3);
        $box->setLength(4);

        $this->assertEquals(58, $wrapCalculator->getTotalSurfaceArea($box));
    }
}
