<?php

namespace WrapCalculator;

class WrapCalculator
{
    /**
     * The total surface area of wrapping paper is the total surface area of the box plus the area of the smallest side.
     *
     * @param Box $box
     * @return float
     */
    public function getTotalSurfaceArea(Box $box)
    {
        return $box->getTotalSurfaceArea() + $box->getSurfaceAreaOfSmallestSide();
    }
}