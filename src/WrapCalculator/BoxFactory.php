<?php

namespace WrapCalculator;

class BoxFactory
{

    /**
     * @param string $dimensions in the format WxHxL ex: 2x3x4
     * @return Box
     */
    public function createBox($dimensions)
    {
        list($width, $height, $length) = explode('x', $dimensions);

        $box = new Box();

        $box->setWidth($width);
        $box->setHeight($height);
        $box->setLength($length);

        return $box;
    }
}