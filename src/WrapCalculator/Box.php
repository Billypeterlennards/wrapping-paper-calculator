<?php

namespace WrapCalculator;

class Box
{

    const SIDE_LENGTH_WIDTH = "lw";
    const SIDE_HEIGHT_WIDTH = "hw";
    const SIDE_HEIGHT_LENGTH = "hl";

    const SIDES = [
        self::SIDE_LENGTH_WIDTH,
        self::SIDE_HEIGHT_WIDTH,
        self::SIDE_HEIGHT_LENGTH,
    ];

    /**
     * @var float
     */
    private $width;

    /**
     * @var float
     */
    private $height;

    /**
     * @var float
     */
    private $length;

    /**
     * @return float
     */
    public function getSurfaceAreaOfSmallestSide()
    {
        $sideSurfaceAreas = [];

        foreach (self::SIDES as $side) {
            $sideSurfaceAreas[] = $this->getSurfaceAreaForSide($side);
        }

        return min($sideSurfaceAreas);
    }

    /**
     * @return float
     */
    public function getTotalSurfaceArea()
    {
        $totalSurfaceArea = 0;

        foreach (self::SIDES as $side) {
            $totalSurfaceArea += 2 * $this->getSurfaceAreaForSide($side);
        }

        return $totalSurfaceArea;
    }

    /**
     * @param string $side
     * @return float
     */
    private function getSurfaceAreaForSide($side)
    {
        switch ($side) {
            case self::SIDE_HEIGHT_LENGTH:
                return $this->height * $this->length;
                break;
            case self::SIDE_HEIGHT_WIDTH:
                return $this->height * $this->width;
                break;
            case self::SIDE_LENGTH_WIDTH:
                return $this->length * $this->width;
                break;
        }

        return 0;
    }

    /**
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param float $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return float
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param float $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

}