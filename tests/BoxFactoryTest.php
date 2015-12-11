<?php

namespace WrapCalculatorTests;

use WrapCalculator\BoxFactory;

class BoxFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testParseDimensions()
    {
        $boxFactory = new BoxFactory();

        $box = $boxFactory->createBox("2x3x4");

        $this->assertEquals(2, $box->getWidth());
        $this->assertEquals(3, $box->getHeight());
        $this->assertEquals(4, $box->getLength());
    }
}
